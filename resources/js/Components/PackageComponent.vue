<script setup lang="ts">
import { useMotion } from "@vueuse/motion";
import { ref } from "vue";

interface Props {
    item: number;
    index: number;
    processing: Boolean | null;
}

const props = defineProps<Props>();
const emit = defineEmits<{
    open: [value: Ticket];
}>();
const itemRef = ref<HTMLElement>();

useMotion(itemRef, {
    initial: {
        opacity: 0,
        y: 100,
    },
    visibleOnce: {
        opacity: 1,
        y: 0,
        transition: {
            delay: 500 * props.index,
            duration: 1000,
        },
    },
});
</script>

<template>
    <div
        ref="itemRef"
        :class="[
            `ring-primary-500 cursor-pointer btn-title flex flex-col justify-between rounded-3xl bg-white dark:bg-slate-800 p-8 shadow-xl ring-1 sm:p-10`,
        ]"
    >
        <div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div  class="col-span-3 flex items-center justify-end">
                    <button class="animate-pulse uppercase text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2">
                        {{ $page.props.app.days }} Jours
                    </button>
                </div>
                <h3
                    :class="[
                    `text-primary-600 dark:text-primary-400 col-span-2 text-base font-semibold leading-7 uppercase`,
                ]"
                >
                    VIP
                </h3>
                <p v-if="true" class="col-span-1 text-center uppercase animate-pulse rounded-full  ring-1 ring-inset ring-rose-600 px-2.5 py-1 text-xs font-semibold leading-5 text-rose-600">
                    {{ $page.props.app.name }}
                </p>
            </div>

            <div class="mt-4 flex items-baseline gap-x-2">
                <span
                    class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900 dark:text-white"
                >
                    5000  {{ $page.props.app.currency }}
                </span>
                <span
                    v-if="true"
                    class="text-xl sm:text-2xl line-through font-bold tracking-tight text-rose-400 dark:text-rose-300"
                >
                    {{ $page.props.app.name }}
                </span>
            </div>
            <p
                class="mt-6 text-base leading-7 text-slate-500 dark:text-slate-400"
                v-html="$page.props.app.name"
            />
            <ul
                role="list"
                class="mt-10 space-y-4 text-sm leading-6 text-gray-600"
            >
                <li
                    v-for="tag in 4"
                    :key="tag"
                    class="flex gap-x-3 justify-between  uppercase"
                >
                    <svg
                        :class="`h-6 w-5 flex-none text-primary-600`"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <span class="truncate">{{ tag }}</span>
                </li>
            </ul>
        </div>
        <button
            aria-describedby="tier-hobby"
            :class="[
                `mt-8 btn-base  bg-primary-600 hover:bg-primary-500 block uppercase rounded-md px-3.5 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600`,
            ]"
        >
            <svg
                v-if="true"
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
            <span>
                {{ __("labels.action.book") }}
            </span>
        </button>
        <div :class="`btn-title flex items-center justify-between rounded-md mt-2 p-2 text-center dark:bg-slate-900 border border-primary-300 dark:border-slate-600 text-xs`">
            <div>
                <dl>
                    <dt class="font-extrabold text-black dark:text-white">
                        {{ $page.props.app.name }}
                    </dt>
                    <dd>{{ __("labels.package.places") }}</dd>
                </dl>
            </div>
            <div>
                <dl>
                    <dt class="font-extrabold text-black dark:text-white">
                        {{ $page.props.app.name }}
                    </dt>
                    <dd class="text-center">
                        {{ __("labels.package.total") }}
                    </dd>
                </dl>
            </div>
            <div>
                <dl>
                    <dt
                        class="font-extrabold text-black dark:text-white"
                    >
                        {{ $page.props.app.name }}
                    </dt>
                    <dd>{{ __("labels.package.per_place") }}</dd>
                </dl>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
