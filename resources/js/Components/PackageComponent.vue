<script setup lang="ts">
import { useMotion } from "@vueuse/motion";
import { ref } from "vue";
import { CheckIcon } from '@heroicons/vue/20/solid'


interface Props {
    item: Object;
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
                <div v-if="item.online" class="col-span-3 flex items-center justify-end">
                    <button class="animate-pulse uppercase text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-2.5 py-1 text-center me-2">
                        Disponible
                    </button>
                </div>
                <h3
                    :class="[
                    `text-primary-600 dark:text-primary-400 col-span-2 text-base font-semibold leading-7 uppercase`,
                ]"
                >
                    {{ item.name }}
                </h3>
                <p v-if="true" class="col-span-1 text-center uppercase rounded-full  ring-1 ring-inset ring-rose-600 px-2.5 py-1 text-xs font-semibold leading-5 text-rose-600">
                    {{ item.days }} Jours
                </p>
            </div>

            <div class="mt-4 flex items-baseline gap-x-2">
                <span
                    class="text-2xl sm:text-3xl font-bold tracking-tight text-slate-900 dark:text-white"
                >
                    {{ item.formatted_price }}  {{ $page.props.app.currency }}
                </span>
                <span
                    v-if="false"
                    class="text-xl sm:text-2xl line-through font-bold tracking-tight text-rose-400 dark:text-rose-300"
                >
                    {{ $page.props.app.name }}
                </span>
            </div>
            <p
                class="mt-6 text-base leading-7 text-slate-500 dark:text-slate-400"
            >{{ 'Revenu quotidien: ' + item.daily_income }}   {{ $page.props.app.currency }}</p>
        </div>
        <button
            aria-describedby="tier-hobby"
            :class="[
                `mt-8 btn-base  bg-primary-600 hover:bg-primary-500 block uppercase rounded-md px-3.5 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600`,
            ]"
        >
            <svg
                v-if="false"
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
                {{ __("ACHETER") }}
            </span>
        </button>
        <div :class="`btn-title flex items-center justify-center rounded-md mt-2 p-2 text-center dark:bg-slate-900 border border-primary-300 dark:border-slate-600 text-xs`">
            <div>
                <dl>
                    <dt class="font-extrabold text-black dark:text-white">
                        Total des revenus
                    </dt>
                    <dd>{{ item.total + ' ' + $page.props.app.currency }}</dd>
                </dl>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
