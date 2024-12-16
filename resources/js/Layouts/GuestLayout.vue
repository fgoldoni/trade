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
                            <Link :href="route('home')">
                                <img
                                    class="h-8 w-auto origin-left transform transition duration-700"
                                    :class="{
                                        'scale-100': !scrolledFromTop,
                                        'scale-75': scrolledFromTop,
                                    }"
                                    src="/images/logo.png"
                                    alt="Demo"
                                />
                            </Link>
                        </div>
                    </div>
                    <div class="ml-6 flex items-center space-x-4">
                        <ThemeSwitcherTheme
                            :scrolled-from-top="scrolledFromTop"
                        />

                        <a
                            v-if="$page.props.auth.user"
                            :href="route('home')"
                            :class="[
                                scrolledFromTop ? 'py-1' : 'py-1.5',
                                'inline-flex items-center rounded-md bg-primary-700 px-3 text-center text-xs font-semibold uppercase text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600',
                            ]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="-ms-1 h-4 w-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>

                            {{ $page.props.auth.user.phone }}
                        </a>

                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="btn-title group flex rounded-md p-1.5 text-sm font-semibold uppercase leading-6 text-rose-700 hover:bg-primary-500 hover:text-rose-600 dark:hover:bg-primary-900"
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
                                class="h-4 w-6 shrink-0 text-rose-400 group-hover:text-rose-600"
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
                class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
                    <Link :href="route('home')"  class="inline-flex flex-col items-center justify-center px-5 border-gray-200 border-x hover:bg-gray-50 dark:hover:bg-gray-800 group dark:border-gray-600">
                        <svg
                            :class="[
                                route().current('home')
                                    ? `text-blue-600`
                                    : 'text-gray-500',
                                `w-5 h-5 mb-2 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        <span
                            :class="[
                                route().current('home')
                                    ? `text-blue-500`
                                    : 'text-gray-500',
                                `text-sm  dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]">Home</span>
                    </Link>
                    <Link :href="route('products.index')" class="inline-flex flex-col items-center justify-center px-5 border-e border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 group dark:border-gray-600">
                        <svg   :class="[
                                route().current('products.index')
                                    ? `text-blue-600`
                                    : 'text-gray-500',
                                `w-5 h-5 mb-2 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>


                        <span
                            :class="[
                                route().current('products.index')
                                    ? `text-blue-500`
                                    : 'text-gray-500',
                                `text-sm  dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]">Commandes</span>
                    </Link>
                    <Link :href="route('home')" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <svg  :class="[
                                route().current('home')
                                    ? `text-blue-600`
                                    : 'text-gray-500',
                                `w-5 h-5 mb-2 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>


                        <span
                            :class="[
                                route().current('home')
                                    ? `text-blue-500`
                                    : 'text-gray-500',
                                `text-sm  dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]">Équipe</span>
                    </Link>
                        <Link :href="route('home')" class="inline-flex flex-col items-center justify-center px-5 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 group border-x dark:border-gray-600">
                            <svg  :class="[
                                route().current('home')
                                    ? `text-blue-600`
                                    : 'text-gray-500',
                                `w-5 h-5 mb-2 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                            </svg>

                            <span
                                :class="[
                                route().current('home')
                                    ? `text-blue-500`
                                    : 'text-gray-500',
                                `text-sm  dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500`,
                            ]">Compte</span>
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
