<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { useMotion } from '@vueuse/motion';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AlertComponent from "@/Components/AlertComponent.vue";

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

const form = useForm({
    id: props.item.id,
});

const submit = () => {
    form.post(route('products.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <div
        ref="itemRef"
        :class="[
            item.online ? 'ring-primary-500' : 'ring-slate-500',
            `btn-title flex cursor-pointer flex-col justify-between rounded-3xl bg-white p-8 shadow-xl ring-1 dark:bg-slate-800 sm:p-10`,
        ]"
    >
        <div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <!--                <div-->
                <!--                    class="col-span-3 flex items-center justify-end"-->
                <!--                >-->
                <!--                    <button-->
                <!--                        :class="[item.online ? 'from-green-400 via-green-500 to-green-600 focus:ring-green-300 dark:focus:ring-green-800' : 'from-slate-400 via-slate-500 to-slate-600 focus:ring-slate-300 dark:focus:ring-slate-800', 'rounded-full bg-gradient-to-r  px-2.5 py-1 text-center text-sm font-medium uppercase text-white hover:bg-gradient-to-br focus:outline-none focus:ring-4']"-->
                <!--                        v-text="item.online ? 'Ouvert' : 'Fermer'"-->
                <!--                    >-->

                <!--                    </button>-->
                <!--                </div>-->
                <h3
                    :class="[
                        `col-span-2 text-base font-semibold uppercase leading-7 text-primary-600 dark:text-primary-400`,
                    ]"
                >
                    {{ item.name }}
                </h3>
                <p
                    v-if="true"
                    class="col-span-1 rounded-full px-2.5 py-1 text-center text-xs font-semibold uppercase leading-5 text-slate-600 ring-1 ring-inset ring-slate-600"
                >
                    {{ item.days }} Jours
                </p>
            </div>

            <div class="mt-4 flex items-baseline gap-x-2">
                <span
                    class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl"
                >
                    {{ item.formatted_price }} {{ $page.props.app.currency }}
                </span>
                <span
                    v-if="false"
                    class="text-xl font-bold tracking-tight text-rose-400 line-through dark:text-rose-300 sm:text-2xl"
                >
                    {{ $page.props.app.name }}
                </span>
            </div>
            <p
                class="mt-6 text-base leading-7 text-slate-500 dark:text-slate-400"
            >
                {{ 'Revenu quotidien: ' + item.daily_income }}
                {{ $page.props.app.currency }}
            </p>
        </div>
        <form @submit.prevent="submit">
            <AlertComponent
                :message="$page.props.flash.error"
                v-if="$page.props.flash.error"
            ></AlertComponent>
            <InputError :message="form.errors.id" />
            <button
                :disabled="!item.online"
                aria-describedby="tier-hobby"
                :class="[
                    item.online
                        ? 'btn-base bg-primary-600 hover:bg-primary-500'
                        : 'bg-slate-600',
                    form.processing ? 'opacity-75' : '',
                    `mt-8 block w-full rounded-md px-3.5 py-2 text-center text-sm font-semibold uppercase leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600`,
                ]"
            >
                <svg
                    v-if="form.processing"
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
                <span v-else v-text="item.online ? 'ACHETER' : 'Fermer'"></span>
            </button>
        </form>
        <div
            :class="`btn-title mt-2 flex items-center justify-center rounded-md border border-primary-300 p-2 text-center text-xs dark:border-slate-600 dark:bg-slate-900`"
        >
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

<style scoped></style>
