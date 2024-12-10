<script setup lang="ts">
import PackagesComponent from '@/Components/PackagesComponent.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Main from '@/Layouts/Main.vue';
import {
    ArrowPathIcon,
    ArrowUpTrayIcon,
    CircleStackIcon,
    QuestionMarkCircleIcon,
} from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';

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
            <section class="py-6 sm:py-12">
                <div class="mx-auto max-w-7xl sm:text-center">
                    <div class="mb-8 grid grid-cols-4 gap-2 sm:gap-4">
                        <div
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-200 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <CircleStackIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-slate-600 hover:underline dark:text-white sm:text-xl"
                            >
                                {{ __('Recharger') }}
                            </p>
                        </div>
                        <div
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-200 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <ArrowUpTrayIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-slate-600 hover:underline dark:text-white sm:text-xl"
                            >
                                {{ __('Retrait') }}
                            </p>
                        </div>
                        <div
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-200 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <ArrowPathIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-slate-600 hover:underline dark:text-white sm:text-xl"
                            >
                                {{ __('Transactions') }}
                            </p>
                        </div>
                        <div
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-200 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <QuestionMarkCircleIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-slate-600 hover:underline dark:text-white sm:text-xl"
                            >
                                {{ __('FAQ') }}
                            </p>
                        </div>
                    </div>
                    <button
                        :class="`btn-base inline-block w-full rounded border border-slate-200 px-8 py-4 text-center text-base font-medium uppercase text-slate-900 shadow-lg dark:border-slate-600 dark:text-white`"
                    >
                        <div class="flex items-center justify-center space-x-4">
                            <svg
                                v-if="true"
                                :class="`inline-flex h-6 w-6 animate-spin text-primary-600`"
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
                            <span v-else>{{ __('labels.add_drinks') }}</span>
                        </div>
                    </button>
                </div>
            </section>
            <PackagesComponent></PackagesComponent>
        </Main>
    </GuestLayout>
</template>
