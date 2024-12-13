<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {
    CheckBadgeIcon,
    ExclamationCircleIcon,
} from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';

defineProps<{
    status: string;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <!-- Section 1 -->
        <section class="pt-24">
            <div class="mx-auto max-w-7xl px-12">
                <div
                    class="mx-auto w-full text-center"
                    v-if="status === 'complete'"
                >
                    <CheckBadgeIcon
                        :class="`mx-auto h-auto w-12 flex-shrink-0 text-green-500 sm:w-16`"
                        aria-hidden="true"
                    />
                    <h1
                        class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight"
                    >
                        <span
                            class="leading-12 block w-full bg-gradient-to-r from-green-400 to-purple-500 bg-clip-text py-2 text-transparent lg:inline"
                            >Merci pour votre paiement</span
                        >
                        <span> 🚀</span>
                    </h1>
                    <p
                        class="mb-8 px-0 text-lg text-gray-600 md:text-xl lg:px-24"
                    >
                        Votre paiement a été reçu.
                    </p>
                    <div class="mb-4 space-x-0 md:mb-8 md:space-x-2">
                        <Link
                            :href="route('home')"
                            class="btn-title mb-2 inline-flex w-full items-center justify-center rounded bg-primary-400 px-6 py-3 text-lg text-white hover:bg-primary-600 sm:mb-0 sm:w-auto"
                        >
                            Accueil
                            <svg
                                class="ml-1 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </Link>
                    </div>
                </div>

                <div class="mx-auto w-full text-center" v-else>
                    <ExclamationCircleIcon
                        :class="`mx-auto h-auto w-12 flex-shrink-0 text-rose-500 sm:w-16`"
                        aria-hidden="true"
                    />
                    <h1
                        class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight"
                    >
                        <span
                            class="leading-12 block w-full bg-gradient-to-r from-rose-400 to-purple-500 bg-clip-text py-2 text-transparent lg:inline"
                            >Oups, quelque chose ne va pas</span
                        >
                    </h1>
                    <p
                        class="mb-8 px-0 text-lg text-gray-600 md:text-xl lg:px-24"
                    >
                        Votre paiement a été annulé.
                    </p>
                    <div class="mb-4 space-x-0 md:mb-8 md:space-x-2">
                        <Link
                            :href="route('home')"
                            class="btn-title mb-2 inline-flex w-full items-center justify-center rounded bg-primary-400 px-6 py-3 text-lg text-white hover:bg-primary-600 sm:mb-0 sm:w-auto"
                        >
                            Accueil
                            <svg
                                class="ml-1 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>
