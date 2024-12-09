<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import RegisterLayout from "@/Layouts/RegisterLayout.vue";
import {onMounted, ref} from "vue";
import Cookies from 'js-cookie'
import GuestLayout from "@/Layouts/GuestLayout.vue";


const form = useForm({
    name: '',
    phone: '666666666',
    password: '00000000',
    password_confirmation: '00000000',
    referral_code: new URL(location.href).searchParams.get('via') || Cookies.get('trade.referral') || null,
});

onMounted(async () => {
    const referral = new URL(location.href).searchParams.get('via')
    if (referral) {
        Cookies.set('trade.referral', referral, {
            expires: 30,
            // domain: '.sitesauce.app',
            // secure: true,
            // sameSite: 'lax',
        })
    }
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>

    <GuestLayout>
        <Head title="Register" />

        <section class="relative w-full">
            <div class="relative px-8 mx-auto max-w-7xl">
                <div
                    class="absolute inset-0 flex justify-end w-full h-full bg-slate-100 opacity-10"
                >
                    <div
                        class="absolute inset-0 w-full h-full bg-repeat opacity-40"
                        style="
                        background-image: url(&quot;https://cdn.devdojo.com/images/august2021/circuit.png&quot;);
                    "
                    ></div>
                    <div
                        class="absolute w-full h-full bg-gradient-to-r from-white to-transparent"
                    ></div>
                </div>
                <div class="relative flex flex-wrap items-center">
                    <div class="relative w-full px-4 mb-12 lg:w-5/12 lg:mb-0">
                        <div class="relative py-20 text-center md:py-32 xl:py-40">
                            <a
                                class="flex justify-center w-full mb-6 text-3xl font-bold lg:justify-start font-heading"
                                href="#"
                            >
                                <svg
                                    class="h-10"
                                    viewBox="0 0 50 39"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M16.5 2h21.08L22.083 24.973H1L16.5 2z"
                                        class="ccompli1"
                                        fill="#007AFF"
                                    ></path>
                                    <path
                                        d="M17.422 27.102L11.42 36h22.082L49 13.027H32.702l-9.496 14.075h-5.784z"
                                        class="ccustom"
                                        fill="#312ECB"
                                    ></path>
                                </svg>
                            </a>
                            <div class="flex flex-col mb-6 lg:items-start">
                                <h1 class="text-3xl sm:text-4xl"><span class="bg-gradient-to-r font-black text-transparent bg-clip-text from-pink-600 pb-2 via-blue-400 to-blue-700 block">
                                   Votre bonus vous attend.
                                </span>
                                </h1>

                                <h3 class="text-xl font-bold sm:text-left">
                                    {{
                                        __(
                                            "Acceptez l'invitation et profitez d'un généreux bonus de bienvenue de 1000 FCFA !",
                                        )
                                    }}
                                </h3>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="mt-4">
                                    <InputLabel for="phone" value="Votre numéro de téléphone" />

                                    <TextInput
                                        id="phone"
                                        type="tel"
                                        class="mt-1 block w-full"
                                        v-model="form.phone"
                                        required
                                        autofocus
                                        placeholder="Veuillez entrer le numéro de téléphone"
                                        autocomplete="phone"
                                    />

                                    <InputError class="mt-2" :message="form.errors.phone" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="password" value="Mot de passe" />

                                    <TextInput
                                        id="password"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="form.password"
                                        required
                                        placeholder="Mot de passe"
                                        autocomplete="current-password"
                                    />

                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel
                                        for="password_confirmation"
                                        value="Confirmer le mot de passe"
                                    />

                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="form.password_confirmation"
                                        required
                                        placeholder="Confirmer le mot de passe"
                                        autocomplete="new-password"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.password_confirmation"
                                    />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="referral_code" value="Code de parrainage" />

                                    <TextInput
                                        id="referral_code"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.referral_code"
                                        placeholder="Code de parrainage"
                                        autocomplete="via"
                                    />

                                    <InputError class="mt-2" :message="form.errors.referral_code" />
                                </div>

                                <div class="mt-4 flex items-center justify-end">
                                    <Link
                                        :href="route('login')"
                                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                    >
                                        Déjà inscrit ?
                                    </Link>

                                    <PrimaryButton
                                        class="ms-4"
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing"
                                    >
                                        S'inscrire
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="top-0 bottom-0 right-0 hidden bg-cover lg:block lg:absolute lg:w-3/6"
                style="background-image: url(&quot;https://nova-s3-bucket-forge.s3.eu-central-1.amazonaws.com/avatars/d9zCZGxHltUaQ62XfTLrA1oY0VHxBsMeRMYBLtbl.jpg&quot;);"
            ></div>
        </section>



    </GuestLayout>
</template>
