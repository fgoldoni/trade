<template>
    <form @submit.prevent="submit">
        <div class="group relative z-0 mb-5 mt-8 w-full text-left">
            <input
                type="number"
                name="amount"
                min="600"
                v-model="form.amount"
                id="amount"
                :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                placeholder=" "
                required
            />
            <label
                for="amount"
                :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
            >
                {{ __('Montant du retrait (-15%)') }}
            </label>
            <InputError :message="form.errors.amount" />
        </div>

        <div class="flex">
            <div class="mr-4 shrink-0">
                <img class="w-16 h-auto" :src="'/images/' + recipient.channel + '.png'" :alt="recipient.account">
            </div>
            <div>
                <div class="flex items-center space-x-4">
                    <h4 class="text-lg font-bold">{{ recipient.account }}</h4>

                    <Link
                        :href="route('recipients.index')"
                        :class="`font-medium text-primary-700 underline hover:text-primary-600`"
                    >
                    <div>
                        {{ __('Modifier') }}
                    </div>
                    </Link>
                </div>

                <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                    <div>{{ recipient.number }}</div>
                    <span class="hidden sm:mx-2 sm:inline" aria-hidden="true">&middot;</span>
                    <div class="mt-1 sm:mt-0">{{ recipient.name }}</div>
                </div>
            </div>
        </div>

        <AlertComponent :message="$page.props.flash.error"  v-if="$page.props.flash.error"></AlertComponent>
        <AlertSuccessComponent :message="$page.props.flash.success"  v-if="$page.props.flash.success"></AlertSuccessComponent>


        <button
            :class="[form.processing ? 'opacity-75': '', `font-heading mt-8 w-full rounded-md bg-primary-700 px-8 py-3 font-bold uppercase text-white hover:bg-primary-600 md:mt-5`]"
            :disabled="form.processing"
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
            <span v-else>{{ __('Retirer') }} <span class="text-rose-300" v-if="form.amount && (form.amount > 0)"> ({{ form.amount - ((15 * form.amount)/100) }} {{ $page.props.app.currency }})</span></span>
        </button>
    </form>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { RadioGroup, RadioGroupOption } from '@headlessui/vue';
import { PlusIcon } from '@heroicons/vue/16/solid';
import { usePage } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AlertComponent from "@/Components/AlertComponent.vue";
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";

const props = defineProps({
    recipient: Object,
});

const form = useForm({
    amount: null,
});
const submit = () => {
    form.post(route('withdrawal.index'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
};
</script>
