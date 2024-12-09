<script setup lang="ts">
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    phone: '',
    password: '',
    remember: true,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

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
                                   Bienvenue à nouveau
                                </span>
                                </h1>

                                <h3 class="text-xl font-bold sm:text-left">
                                    {{
                                        __(
                                            "Gagnez 30 % de bonus de parrainage ainsi qu'une prime d'inscription de 1000 FCFA.",
                                        )
                                    }}
                                </h3>
                            </div>
                            <form @submit.prevent="submit" class="mt-8">

                                <div
                                    class="relative z-0 w-full mb-5 mt-8 group text-left"
                                >
                                    <input
                                        type="text"
                                        name="phone"
                                        v-model="form.phone"
                                        id="phone"
                                        :class="`block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-300 appearance-none dark:text-white dark:border-slate-600 dark:focus:border-primary-500 focus:outline-none focus:ring-0 focus:border-primary-600 peer`"
                                        placeholder=" "
                                        required
                                    />
                                    <label
                                        for="phone"
                                        :class="`peer-focus:font-medium absolute text-sm text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary-600 peer-focus:dark:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6`"
                                    >
                                        {{ __("Votre numéro de téléphone") }}
                                    </label>
                                    <InputError
                                        :message="form.errors.phone"
                                    />
                                </div>

                                <div
                                    class="relative z-0 w-full mb-5 mt-8 group text-left"
                                >
                                    <input
                                        type="password"
                                        name="password"
                                        v-model="form.password"
                                        id="password"
                                        :class="`block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-300 appearance-none dark:text-white dark:border-slate-600 dark:focus:border-primary-500 focus:outline-none focus:ring-0 focus:border-primary-600 peer`"
                                        placeholder=" "
                                        required
                                    />
                                    <label
                                        for="password"
                                        :class="`peer-focus:font-medium absolute text-sm text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary-600 peer-focus:dark:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6`"
                                    >
                                        {{ __("Mot de passe") }}
                                    </label>
                                    <InputError
                                        :message="form.errors.password"
                                    />
                                </div>

                                <div class="mt-4 block">
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="flex rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                    >
                                        Mot de passe oublié ?
                                    </Link>
                                </div>

                                <div class="mt-4 flex items-center justify-end">
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('register')"
                                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                    >
                                        Inscrivez-vous ici
                                    </Link>

                                    <PrimaryButton
                                        class="ms-4"
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing"
                                    >
                                        Se connecter
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
