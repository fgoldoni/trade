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
import WelcomeModal from "@/Components/WelcomeModal.vue";

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

</script>

<template>
    <Head title="Welcome" />
    <WelcomeModal></WelcomeModal>
    <GuestLayout>
        <Main>
            <section class="py-6 sm:py-12">
                <div class="mx-auto max-w-7xl sm:text-center">
                    <div class="mb-8 grid grid-cols-4 gap-2 sm:gap-4">
                        <Link
                            :href="route('deposits.index')"
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-900 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <CircleStackIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-white hover:underline sm:text-xl"
                            >
                                {{ __('Dépôt') }}
                            </p>
                        </Link>
                        <Link
                            :href="route('withdrawal.index')"
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-900 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <ArrowUpTrayIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-white hover:underline sm:text-xl"
                            >
                                {{ __('Retrait') }}
                            </p>
                        </Link>
                        <Link
                            :href="route('transactions.index')"
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-900 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <ArrowPathIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-white hover:underline sm:text-xl"
                            >
                                {{ __('Transactions') }}
                            </p>
                        </Link>
                        <Link
                            :href="route('faqs.index')"
                            class="btn-base flex cursor-pointer flex-col items-center justify-center rounded-lg border border-slate-300 bg-primary-900 py-4 shadow-lg dark:border-slate-700 dark:bg-primary-800"
                        >
                            <QuestionMarkCircleIcon
                                :class="`mx-auto h-auto w-8 flex-shrink-0 text-primary-500 sm:w-16`"
                                aria-hidden="true"
                            />
                            <p
                                class="mt-4 text-xs font-bold text-white hover:underline sm:text-xl"
                            >
                                {{ __('FAQ') }}
                            </p>
                        </Link>
                    </div>
                    <Invitation></Invitation>
                </div>
            </section>
            <PackagesComponent></PackagesComponent>
        </Main>
    </GuestLayout>
</template>
