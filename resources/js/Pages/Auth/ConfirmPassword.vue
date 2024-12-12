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
import Heading from "@/Pages/Deposits/Heading.vue";

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

        <Heading title="Confirmation de mot de passe" class="mt-8 px-8"></Heading>


        <!-- Section 1 -->
        <section class="py-8">

            <div class="max-w-5xl px-10 mx-auto xl:px-5">

                <div class="flex flex-col justify-center space-y-8">
                    <LockClosedIcon
                        :class="`mx-auto h-auto w-12 flex-shrink-0 text-green-500 sm:w-16`"
                        aria-hidden="true"
                    />
                    <h2 class="w-full mx-auto text-xl font-extrabold leading-none text-center text-gray-600  dark:text-gray-400 sm:text-5xl md:text-4xl md:text-center">Confirmation de mot de passe</h2>

                    <form @submit.prevent="submit">
                        <div
                            class="group relative z-0 mb-5 mt-8 w-full text-left"
                        >
                            <input
                                type="password"
                                name="password"
                                v-model="form.password"
                                id="password"
                                :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                                placeholder=" "
                                required
                            />
                            <label
                                for="password"
                                :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
                            >
                                {{ __('Confirmez votre mot de passe.') }}
                            </label>
                            <InputError
                                :message="form.errors.password"
                            />
                        </div>

                        <button
                            :class="[form.processing ? 'opacity-75': '', `font-heading mt-8 w-full rounded-md bg-primary-700 px-8 py-3 font-bold uppercase text-white hover:bg-primary-600 md:mt-5`]"
                            :disabled="form.processing"
                        >
                            <svg
                                v-if="form.processing"
                                class="inline-flex h-5 w-5 animate-spin text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            <span v-else>{{ __('Confirmer') }}</span>
                        </button>
                    </form>

                </div>

            </div>
        </section>

    </GuestLayout>
</template>
