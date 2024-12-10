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
            <div :class="`bg-primary-900`">
                <div
                    class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8"
                >
                    <form>
                        <div>
                            <label for="desktop-currency" class="sr-only"
                                >Currency</label
                            >

                            <div
                                :class="[
                                    scrolledFromTop ? 'scale-75' : 'scale-100',
                                    'group relative -ml-2 rounded-md border-transparent bg-primary-900 focus-within:ring-2 focus-within:ring-primary-700',
                                ]"
                            >
                                <select
                                    id="desktop-currency"
                                    name="currency"
                                    :class="`flex items-center rounded-md border-transparent bg-primary-800 bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-white focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-slate-100`"
                                >
                                    <option>EUR</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <LanguageSwitcherComponent
                        :scrolled-from-top="scrolledFromTop"
                    />
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
                            v-if="false"
                            :href="route('dashboard')"
                            :class="[
                                scrolledFromTop ? 'py-1' : 'py-1.5',
                                'rounded-md bg-primary-700 px-3 text-xs font-semibold uppercase text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600',
                            ]"
                            >{{ __('Login') }}</a
                        >

                        <a
                            v-else
                            @click="logout"
                            href="javascript:;"
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
                        </a>
                    </div>
                </div>
            </div>
        </Disclosure>

        <div>
            <main class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script setup lang="ts">
import LanguageSwitcherComponent from '@/Layouts/LanguageSwitcherComponent.vue';
import ThemeSwitcherTheme from '@/Layouts/ThemeSwitcherTheme.vue';
import ApiError from '@/models/ApiError';
import { Disclosure } from '@headlessui/vue';
import { ArrowRightOnRectangleIcon } from '@heroicons/vue/24/outline';
import { onMounted, onUnmounted, ref } from 'vue';

const scrolledFromTop = ref(false);
const openMenuSidebar = ref(false);

const navigation = [
    { name: 'Tickets', href: 'tickets.index', current: true },
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
