<script setup lang="ts">
import Invitation from '@/Components/Invitation.vue';
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
                        <Link
                            :href="route('deposits.index')"
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-200 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <CircleStackIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-slate-600 hover:underline dark:text-white sm:text-xl"
                            >
                                {{ __('Dépôt') }}
                            </p>
                        </Link>
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
                    <Invitation></Invitation>
                </div>
            </section>
            <PackagesComponent></PackagesComponent>
        </Main>
    </GuestLayout>
</template>
