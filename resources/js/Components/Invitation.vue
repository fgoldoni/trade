<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { useClipboard } from '@vueuse/core';
import { ref } from 'vue';

const { text, copy, copied, isSupported } = useClipboard({ source });
const defaultMessage = ref<HTMLElement>();
const successMessage = ref<HTMLElement>();
const source = ref(
    route('register') + '?via=' + usePage().props.auth.user.referral_code,
);

const showSuccess = () => {
    defaultMessage.value.classList.add('hidden');
    successMessage.value.classList.remove('hidden');
};

const resetToDefault = () => {
    defaultMessage.value.classList.remove('hidden');
    successMessage.value.classList.add('hidden');
};
const clipboard = async () => {
    await copy(source.value);
    showSuccess();
    setTimeout(() => {
        resetToDefault();
    }, 2000);
};
</script>

<template>
    <!-- Section 1 -->
    <section class="rounded border border-primary-200 shadow-lg">
        <div
            class="mx-auto flex max-w-7xl flex-col items-center justify-center px-5 py-8 md:px-0"
        >
            <div class="relative">
                <h2
                    class="relative bg-gradient-to-br from-indigo-400 via-indigo-600 to-indigo-500 bg-cover bg-clip-text bg-center text-xl font-black text-transparent lg:text-2xl"
                    style="
                        background-image: url('https://cdn.devdojo.com/images/february2021/bg-colorful.jpg');
                    "
                >
                    Lien d'invitation
                </h2>
            </div>
            <p class="mt-3 text-sm text-gray-500 lg:text-xl">
                Code: {{ $page.props.auth.user.referral_code }}
            </p>
            <div
                class="mt-5 flex w-full flex-col justify-center space-y-3 sm:flex-row sm:space-x-3 sm:space-y-0 lg:mt-8"
            >
                <div class="w-full px-8" v-if="isSupported">
                    <div class="relative">
                        <label for="npm-install-copy-text" class="sr-only"
                            >Label</label
                        >
                        <input
                            id="npm-install-copy-text"
                            type="text"
                            class="col-span-6 block w-full rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-4 text-sm text-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            :value="
                                route('register') +
                                '?via=' +
                                $page.props.auth.user.referral_code
                            "
                            disabled
                            readonly
                        />
                        <button
                            @click="clipboard()"
                            data-copy-to-clipboard-target="npm-install-copy-text"
                            class="absolute end-2.5 top-1/2 inline-flex -translate-y-1/2 items-center justify-center rounded-lg border border-gray-200 bg-white px-2.5 py-2 text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700"
                        >
                            <span
                                ref="defaultMessage"
                                id="default-message"
                                class="inline-flex items-center"
                            >
                                <svg
                                    class="me-1.5 h-3 w-3"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 18 20"
                                >
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"
                                    />
                                </svg>
                                <span class="text-xs font-semibold"
                                    >Copier</span
                                >
                            </span>
                            <span
                                ref="successMessage"
                                id="success-message"
                                class="inline-flex hidden items-center"
                            >
                                <svg
                                    class="me-1.5 h-3 w-3 text-blue-700 dark:text-blue-500"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    />
                                </svg>
                                <span
                                    class="text-xs font-semibold text-blue-700 dark:text-blue-500"
                                    >Copié</span
                                >
                            </span>
                        </button>
                    </div>
                </div>

                <p v-else>
                    Votre navigateur ne prend pas en charge l'API du presse-papiers.
                </p>
            </div>
        </div>
    </section>
</template>

<style scoped></style>
