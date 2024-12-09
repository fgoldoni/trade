<template>
    <div
        class="min-h-full bg-white dark:bg-slate-900 text-slate-600 text-slate-500 dark:text-slate-400"
    >
        <Disclosure
            as="nav"
            :class="[
                scrolledFromTop ? 'fixed bg-opacity-75' : 'relative',
                'w-full bg-primary-600 dark:bg-slate-900 z-40 transition-all ease-in duration-700 border-b border-slate-200 dark:border-slate-700',
            ]"
            v-slot="{ open }"
        >
            <div :class="`bg-primary-900`">
                <div class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
                    <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
                        <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)" />
                    </div>
                    <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
                        <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)" />
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                        <p class="text-sm/6 text-gray-900">
                            <strong class="font-semibold">{{$page.props.app.name}}</strong><svg viewBox="0 0 2 2" class="mx-2 inline size-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                            {{$page.props.app.description}}
                        </p>
                        <a v-if="false" href="#" class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register now <span aria-hidden="true">&rarr;</span></a>
                    </div>
                    <div class="flex flex-1 justify-end">
                        <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                            <span class="sr-only">Dismiss</span>
                            <XMarkIcon class="size-5 text-gray-900" aria-hidden="true" />
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
                                    class="h-8 w-auto transform origin-left transition duration-700"
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
                                            ? 'uppercase bg-primary-700 text-white'
                                            : 'text-white hover:bg-primary-500 hover:bg-opacity-75',
                                        'uppercase rounded-md px-3 text-xs font-medium',
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
                    <div class="ml-6 flex space-x-4 items-center">
                        <ThemeSwitcherTheme
                            :scrolled-from-top="scrolledFromTop"
                        />
                        <a
                            v-if="false"
                            :href="route('dashboard')"
                            :class="[
                                scrolledFromTop ? 'py-1' : 'py-1.5',
                                'uppercase rounded-md bg-primary-700 px-3 text-xs font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600',
                            ]"
                        >{{ __("Login") }}</a>

                        <a
                            v-else
                            @click="logout"
                            href="javascript:;"
                            class="group btn-title uppercase -mx-2 flex rounded-md p-2 text-sm font-semibold leading-6 text-rose-700 hover:bg-rose-50 dark:hover:bg-slate-900 hover:text-rose-600"
                        >
                            <svg
                                v-if="processing"
                                class="animate-spin h-5 w-5 inline-flex text-white"
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
import {Disclosure} from "@headlessui/vue";
import { ArrowRightOnRectangleIcon } from "@heroicons/vue/24/outline";
import { onMounted, onUnmounted, ref } from "vue";
import ThemeSwitcherTheme from "@/Layouts/ThemeSwitcherTheme.vue";
import LanguageSwitcherComponent from "@/Layouts/LanguageSwitcherComponent.vue";
import { XMarkIcon } from '@heroicons/vue/20/solid'
import ApiError from "@/models/ApiError";


const scrolledFromTop = ref(false);
const openMenuSidebar = ref(false);

const navigation = [
    { name: "Tickets", href: "tickets.index", current: true },
    { name: "FAQ", href: "faqs.index", current: false },
    { name: "Kontakt", href: "contacts.index", current: false },
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
        debugger
    } catch (error) {
        throw new ApiError(error);
    }
};

onMounted(async () => {
    window.addEventListener("scroll", onScroll);
    window.pageYOffset >= 50
        ? (scrolledFromTop.value = true)
        : (scrolledFromTop.value = false);
});

onUnmounted(() => {
    window.removeEventListener("scroll", onScroll);
});
</script>
