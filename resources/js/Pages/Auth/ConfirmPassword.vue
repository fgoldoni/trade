<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import {
    LockClosedIcon,
    ExclamationCircleIcon,
} from '@heroicons/vue/24/outline';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />


        <!-- Section 1 -->
        <section class="py-20">

            <div class="max-w-5xl px-10 mx-auto xl:px-5">

                <div class="flex flex-col justify-center space-y-8">
                    <LockClosedIcon
                        :class="`mx-auto h-auto w-12 flex-shrink-0 text-yellow-500 sm:w-16`"
                        aria-hidden="true"
                    />
                    <h2 class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-gray-600  dark:text-gray-400 sm:text-5xl md:text-7xl md:text-center">Confirmation de mot de passe</h2>
                    <p class="w-full max-w-3xl mx-auto text-xl text-left text-gray-500 md:text-2xl md:text-center">
                        Vous êtes dans une zone sécurisée de l'application. Nous vous invitons à confirmer votre mot de passe avant de continuer.
                    </p>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="password" value="Mot de passe" />
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                                placeholder="Mot de passe"
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <PrimaryButton
                                class="ms-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Confirmer
                            </PrimaryButton>
                        </div>
                    </form>

                </div>

            </div>
        </section>

    </GuestLayout>
</template>
