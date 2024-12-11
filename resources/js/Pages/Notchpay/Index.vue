<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {
    CheckBadgeIcon,
    ArrowUpTrayIcon,
    CircleStackIcon,
    QuestionMarkCircleIcon,
} from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>

        <!-- Section 1 -->
        <section class="pt-24">
            <div class="px-12 mx-auto max-w-7xl">
                <div class="w-full mx-auto text-center">
                    <CheckBadgeIcon
                        :class="`mx-auto h-auto w-12 flex-shrink-0 text-green-500 sm:w-16`"
                        aria-hidden="true"
                    />
                    <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight">
                        <span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">Merci pour votre paiement</span> <span> 🚀</span>
                    </h1>
                    <p class="px-0 mb-8 text-lg text-gray-600 md:text-xl lg:px-24">
                        Votre paiement a été reçu.
                    </p>
                    <div class="mb-4 space-x-0 md:space-x-2 md:mb-8">
                        <Link :href="route('home')" class="btn-title inline-flex items-center justify-center w-full px-6 py-3 mb-2 text-lg text-white bg-primary-400  hover:bg-primary-600 rounded sm:w-auto sm:mb-0">
                            Accueil
                            <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </Link>
                    </div>
                </div>
            </div>
        </section>

    </GuestLayout>
</template>
