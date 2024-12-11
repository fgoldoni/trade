<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
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
            <div class="relative mx-auto max-w-7xl px-8">
                <div
                    class="absolute inset-0 flex h-full w-full justify-end bg-slate-100 opacity-10"
                >
                    <div
                        class="absolute inset-0 h-full w-full bg-repeat opacity-40"
                        style="
                            background-image: url('https://cdn.devdojo.com/images/august2021/circuit.png');
                        "
                    ></div>
                    <div
                        class="absolute h-full w-full bg-gradient-to-r from-white to-transparent"
                    ></div>
                </div>
                <div class="relative flex flex-wrap items-center">
                    <div class="relative mb-12 w-full px-4 lg:mb-0 lg:w-5/12">
                        <div
                            class="relative py-4 text-center md:py-32 xl:py-40"
                        >
                            <a
                                class="font-heading mb-6 flex w-full justify-center text-3xl font-bold lg:justify-start"
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
                            <div class="mb-6 flex flex-col lg:items-start">
                                <h1 class="text-xl sm:text-2xl">
                                    <span
                                        class="block bg-gradient-to-r from-pink-600 via-blue-400 to-blue-700 bg-clip-text pb-2 font-black text-transparent"
                                    >
                                        Bienvenue à nouveau
                                    </span>
                                </h1>

                                <h3 class="text-lg font-bold sm:text-left">
                                    {{
                                        __(
                                            'Gagnez 30 % de bonus de parrainage !',
                                        )
                                    }}
                                </h3>
                            </div>
                            <form @submit.prevent="submit" class="mt-8">
                                <div
                                    class="group relative z-0 mb-5 mt-8 w-full text-left"
                                >
                                    <input
                                        type="number"
                                        name="phone"
                                        v-model="form.phone"
                                        id="phone"
                                        :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                                        placeholder=" "
                                        required
                                    />
                                    <label
                                        for="phone"
                                        :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
                                    >
                                        {{ __('Votre numéro de téléphone') }}
                                    </label>
                                    <InputError :message="form.errors.phone" />
                                </div>

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
                                        {{ __('Mot de passe') }}
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

                                <div class="mt-10 flex items-center justify-end">
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('register')"
                                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                    >
                                        Inscrivez-vous ici
                                    </Link>

                                    <PrimaryButton
                                        class="ms-4"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
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
                class="bottom-0 right-0 top-0 hidden bg-cover lg:absolute lg:block lg:w-3/6"
                style="
                    background-image: url('https://nova-s3-bucket-forge.s3.eu-central-1.amazonaws.com/avatars/d9zCZGxHltUaQ62XfTLrA1oY0VHxBsMeRMYBLtbl.jpg');
                "
            ></div>
        </section>
    </GuestLayout>
</template>
