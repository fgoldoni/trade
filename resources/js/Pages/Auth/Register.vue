<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import RegisterLayout from "@/Layouts/RegisterLayout.vue";
import {onMounted, ref} from "vue";
import Cookies from 'js-cookie'


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
    <RegisterLayout>
        <Head title="Register" />

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
    </RegisterLayout>
</template>
