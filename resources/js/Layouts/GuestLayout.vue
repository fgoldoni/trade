<template>
    <div
        class="min-h-full bg-white text-slate-500 text-slate-600 dark:bg-slate-900 dark:text-slate-400"
    >
        <Disclosure
            as="nav"
            :class="[
                scrolledFromTop ? 'fixed bg-opacity-75' : 'relative',
                'z-40 w-full border-b border-slate-200 bg-primary-600 transition-all duration-700 ease-in dark:border-slate-700 dark:bg-slate-900',
            ]"
            v-slot="{ open }"
        >
            <div v-if="false" :class="`bg-primary-900`">
                <div
                    class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1"
                >
                    <div
                        class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl"
                        aria-hidden="true"
                    >
                        <div
                            class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30"
                            style="
                                clip-path: polygon(
                                    74.8% 41.9%,
                                    97.2% 73.2%,
                                    100% 34.9%,
                                    92.5% 0.4%,
                                    87.5% 0%,
                                    75% 28.6%,
                                    58.5% 54.6%,
                                    50.1% 56.8%,
                                    46.9% 44%,
                                    48.3% 17.4%,
                                    24.7% 53.9%,
                                    0% 27.9%,
                                    11.9% 74.2%,
                                    24.9% 54.1%,
                                    68.6% 100%,
                                    74.8% 41.9%
                                );
                            "
                        />
                    </div>
                    <div
                        class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl"
                        aria-hidden="true"
                    >
                        <div
                            class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30"
                            style="
                                clip-path: polygon(
                                    74.8% 41.9%,
                                    97.2% 73.2%,
                                    100% 34.9%,
                                    92.5% 0.4%,
                                    87.5% 0%,
                                    75% 28.6%,
                                    58.5% 54.6%,
                                    50.1% 56.8%,
                                    46.9% 44%,
                                    48.3% 17.4%,
                                    24.7% 53.9%,
                                    0% 27.9%,
                                    11.9% 74.2%,
                                    24.9% 54.1%,
                                    68.6% 100%,
                                    74.8% 41.9%
                                );
                            "
                        />
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                        <p class="text-sm/6 text-gray-900">
                            <strong class="font-semibold">{{
                                $page.props.app.name
                            }}</strong
                            ><svg
                                viewBox="0 0 2 2"
                                class="mx-2 inline size-0.5 fill-current"
                                aria-hidden="true"
                            >
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            {{ $page.props.app.description }}
                        </p>
                        <a
                            href="#"
                            class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900"
                            >Register now
                            <span aria-hidden="true">&rarr;</span></a
                        >
                    </div>
                    <div class="flex flex-1 justify-end">
                        <button
                            type="button"
                            class="-m-3 p-3 focus-visible:outline-offset-[-4px]"
                        >
                            <span class="sr-only">Dismiss</span>
                            <XMarkIcon
                                class="size-5 text-gray-900"
                                aria-hidden="true"
                            />
                        </button>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="flex justify-between transition-all duration-700"
                    :class="{
                        'h-16': !scrolledFromTop,
                        'h-14': scrolledFromTop,
                    }"
                >
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <Link :href="route('dashboard')">
                                <img
                                    class="h-8 w-auto origin-left transform transition duration-700"
                                    :class="{
                                        'scale-100': !scrolledFromTop,
                                        'scale-75': scrolledFromTop,
                                    }"
                                    src="https://nova-s3-bucket-forge.s3.eu-central-1.amazonaws.com/avatars/d3wVUgeVem07hPUB2bZ0z69KirpM92oajy31ZaN8.png"
                                    alt="Demo"
                                />
                            </Link>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <Link
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    :class="[
                                        scrolledFromTop ? 'py-1' : 'py-1.5',
                                        route().current(item.href)
                                            ? 'bg-primary-700 uppercase text-white'
                                            : 'text-white hover:bg-primary-500 hover:bg-opacity-75',
                                        'rounded-md px-3 text-xs font-medium uppercase',
                                    ]"
                                    :aria-current="
                                        route().current(item.href)
                                            ? 'page'
                                            : undefined
                                    "
                                    >{{ item.name }}
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div class="ml-6 flex items-center space-x-4">
                        <ThemeSwitcherTheme
                            :scrolled-from-top="scrolledFromTop"
                        />

                        <a
                            v-if="!$page.props.auth.user"
                            :href="route('dashboard')"
                            :class="[
                                scrolledFromTop ? 'py-1' : 'py-1.5',
                                'rounded-md bg-primary-700 px-3 text-xs font-semibold uppercase text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600',
                            ]"
                            >{{ __('Login') }}</a
                        >

                        <Link
                            v-else
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="btn-title group -mx-2 flex rounded-md p-2 text-sm font-semibold uppercase leading-6 text-rose-700 hover:bg-rose-50 hover:text-rose-600 dark:hover:bg-slate-900"
                        >
                            <svg
                                v-if="processing"
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
                            <ArrowRightOnRectangleIcon
                                v-if="!processing"
                                class="h-6 w-6 shrink-0 text-rose-400 group-hover:text-rose-600"
                                aria-hidden="true"
                            />
                        </Link>
                    </div>
                </div>
            </div>
        </Disclosure>

        <div>
            <main class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot></slot>
            </main>

            <div
                v-if="
                    !route().current('login') &&
                    !route().current('register') &&
                    $page.props.auth.user
                "
                :class="`fixed bottom-0 left-0 z-50 h-16 w-full border-t border-slate-200 bg-white dark:border-slate-600 dark:bg-slate-700`"
            >
                <div
                    class="mx-auto grid h-full max-w-lg grid-cols-4 font-medium"
                >
                    <Link
                        :href="route('home')"
                        :class="[
                            route().current('home') ? `bg-primary-900` : '',
                            `btn-title group inline-flex flex-col items-center justify-center px-5 hover:bg-primary-900 dark:hover:bg-primary-800`,
                        ]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            :class="[
                                    route().current('home') ? `text-slate-300` : 'text-slate-400',
                                    `mb-2 h-6 w-6 group-hover:text-white dark:text-slate-200`,
                                ]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                            />
                        </svg>

                        <span
                            :class="`text-sm text-slate-400 group-hover:text-white dark:text-slate-400`"
                            >{{ __('Accueil') }}</span
                        >
                    </Link>
                    <Link
                        :href="route('home')"
                        :class="[
                            route().current('home') ? `bg-primary-900` : '',
                            `btn-title group inline-flex flex-col items-center justify-center px-5 hover:bg-primary-900 dark:hover:bg-primary-800`,
                        ]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                           :class="[
                                    route().current('home') ? `text-slate-300` : 'text-slate-400',
                                    `mb-2 h-6 w-6 group-hover:text-white dark:text-slate-200`,
                                ]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"
                            />
                        </svg>

                        <span
                            :class="`text-sm text-slate-400 group-hover:text-white dark:text-slate-400`"
                            >{{ __('Commandes') }}</span
                        >
                    </Link>
                    <Link
                        :href="route('home')"
                        :class="[
                            route().current('home') ? `bg-primary-900` : '',
                            `btn-title group inline-flex flex-col items-center justify-center px-5 hover:bg-primary-900 dark:hover:bg-primary-800`,
                        ]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                           :class="[
                                    route().current('home') ? `text-slate-300` : 'text-slate-400',
                                    `mb-2 h-6 w-6 group-hover:text-white dark:text-slate-200`,
                                ]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
                            />
                        </svg>

                        <span
                            :class="`text-sm text-slate-400 group-hover:text-white dark:text-slate-400`"
                            >{{ __('Équipe') }}</span
                        >
                    </Link>
                    <Link
                        :href="route('home')"
                        :class="[
                            route().current('home') ? `bg-primary-900` : '',
                            `btn-title group inline-flex flex-col items-center justify-center px-5 hover:bg-primary-900 dark:hover:bg-primary-800`,
                        ]"
                    >
                        <svg
                           :class="[
                                    route().current('home') ? `text-slate-300` : 'text-slate-400',
                                    `mb-2 h-6 w-6 group-hover:text-white dark:text-slate-200`,
                                ]"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"
                            />
                        </svg>
                        <span
                            :class="`text-sm text-slate-400 group-hover:text-white dark:text-slate-400`"
                            >{{ __('Compte') }}</span
                        >
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ThemeSwitcherTheme from '@/Layouts/ThemeSwitcherTheme.vue';
import ApiError from '@/models/ApiError';
import { Disclosure } from '@headlessui/vue';
import { XMarkIcon } from '@heroicons/vue/20/solid';
import { ArrowRightOnRectangleIcon } from '@heroicons/vue/24/outline';
import { onMounted, onUnmounted, ref } from 'vue';

const scrolledFromTop = ref(false);
const openMenuSidebar = ref(false);

const navigation = [
    { name: 'Tickets', href: 'home', current: true },
    { name: 'FAQ', href: 'faqs.index', current: false },
    { name: 'Kontakt', href: 'contacts.index', current: false },
];

const processing = ref(false);

const onScroll = () => {
    window.pageYOffset >= 50
        ? (scrolledFromTop.value = true)
        : (scrolledFromTop.value = false);
};

const logout = async () => {
    try {
        processing.value = true;
        debugger;
    } catch (error) {
        throw new ApiError(error);
    }
};

onMounted(async () => {
    window.addEventListener('scroll', onScroll);
    window.pageYOffset >= 50
        ? (scrolledFromTop.value = true)
        : (scrolledFromTop.value = false);
});

onUnmounted(() => {
    window.removeEventListener('scroll', onScroll);
});
</script>
