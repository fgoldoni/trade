<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    QuestionMarkCircleIcon,
    ArrowPathIcon,
    CircleStackIcon,
    ArrowUpTrayIcon,
} from "@heroicons/vue/24/outline";
import Main from "@/Layouts/Main.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PackagesComponent from "@/Components/PackagesComponent.vue";

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <Main>
            <section class="py-12 sm:py-16">
                <div class="max-w-7xl mx-auto sm:text-center">
                    <div class="grid grid-cols-4 gap-4 mb-8">
                        <div  class="btn-base cursor-pointer bg-primary-200 dark:bg-primary-800 rounded-lg py-4 flex flex-col items-center justify-center shadow-lg border border-slate-300 dark:border-slate-700"
                        >
                            <CircleStackIcon
                                :class="`mx-auto w-8 sm:w-16 h-auto text-primary-500 flex-shrink-0`"
                                aria-hidden="true"
                            />
                            <p
                                class="text-slate-800 dark:text-white font-bold mt-4 text-sm sm:text-xl hover:underline"
                            >
                                {{ __('Recharger') }}
                            </p>
                        </div>
                        <div
                            class="btn-base cursor-pointer bg-primary-200 dark:bg-primary-800 rounded-lg py-4 flex flex-col items-center justify-center shadow-lg border border-slate-300 dark:border-slate-700"
                        >
                            <ArrowUpTrayIcon
                                :class="`mx-auto w-8 sm:w-16 h-auto text-primary-500 flex-shrink-0`"
                                aria-hidden="true"
                            />
                            <p
                                class="text-slate-800 dark:text-white font-bold mt-4 text-sm sm:text-xl hover:underline"
                            >
                                {{ __('Retrait') }}
                            </p>
                        </div>
                        <div
                            class="btn-base cursor-pointer bg-primary-200 dark:bg-primary-800 rounded-lg py-4 flex flex-col items-center justify-center shadow-lg border border-slate-300 dark:border-slate-700"
                        >
                            <ArrowPathIcon
                                :class="`mx-auto w-8 sm:w-16 h-auto text-primary-500 flex-shrink-0`"
                                aria-hidden="true"
                            />
                            <p
                                class="text-slate-800 dark:text-white font-bold mt-4 text-sm sm:text-xl hover:underline"
                            >
                                {{ __('Transactions') }}
                            </p>
                        </div>
                        <div
                            class="btn-base cursor-pointer bg-primary-200 dark:bg-primary-800 rounded-lg py-4 flex flex-col items-center justify-center shadow-lg border border-slate-300 dark:border-slate-700"
                        >
                            <QuestionMarkCircleIcon
                                :class="`mx-auto w-8 sm:w-16 h-auto text-primary-500 flex-shrink-0`"
                                aria-hidden="true"
                            />
                            <p
                                class="text-slate-800 dark:text-white font-bold mt-4 text-sm sm:text-xl hover:underline"
                            >
                                {{ __('FAQ') }}
                            </p>
                        </div>
                    </div>
                    <button
                        :class="`uppercase btn-base px-8 py-4 w-full shadow-lg border border-slate-200 dark:border-slate-600 text-center text-base font-medium inline-block rounded text-slate-900 dark:text-white`"
                    >
                        <div class="flex items-center justify-center space-x-4">
                            <svg
                                v-if="true"
                                :class="`animate-spin h-6 w-6 inline-flex text-primary-600`"
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
                            <span v-else>{{ __("labels.add_drinks") }}</span>
                        </div>
                    </button>
                </div>
            </section>
            <PackagesComponent></PackagesComponent>
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                    >
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            You're lsogged in!
                        </div>
                    </div>
                </div>
            </div>
        </Main>
    </GuestLayout>
</template>
