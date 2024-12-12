<template>
    <form @submit.prevent="submit">
        <div class="group relative z-0 mb-5 mt-8 w-full text-left">
            <input
                type="text"
                name="name"
                v-model="form.name"
                id="name"
                :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                placeholder=" "
                required
            />
            <label
                for="name"
                :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
            >
                {{ __('Titulaire') }}
            </label>
            <InputError :message="form.errors.name" />
        </div>

        <div class="group relative z-0 mb-5 mt-8 w-full text-left">
            <input
                type="number"
                name="number"
                v-model="form.number"
                id="number"
                :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                placeholder=" "
                required
            />
            <label
                for="number"
                :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
            >
                {{ __('Numéro de account de paiement') }}
            </label>
            <InputError :message="form.errors.number" />
        </div>

        <div class="group relative z-0 mb-5 mt-8 w-full text-left">
            <input
                type="number"
                name="number_confirmation"
                v-model="form.number_confirmation"
                id="number_confirmation"
                :class="`peer block w-full appearance-none border-0 border-b-2 border-slate-300 bg-transparent px-0 py-2.5 text-sm text-slate-900 focus:border-primary-600 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-white dark:focus:border-primary-500`"
                placeholder=" "
                required
            />
            <label
                for="number"
                :class="`absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-slate-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-primary-600 dark:text-slate-400 peer-focus:dark:text-primary-500 rtl:peer-focus:translate-x-1/4`"
            >
                {{ __('Confirmez votre numéro de paiement') }}
            </label>
            <InputError :message="form.errors.number_confirmation" />
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
            <span v-else>{{ __('Enregistrer') }}</span>
        </button>
    </form>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { RadioGroup, RadioGroupOption } from '@headlessui/vue';
import { PlusIcon } from '@heroicons/vue/16/solid';
import { usePage } from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import AlertComponent from "@/Components/AlertComponent.vue";
import { useForm } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";

const props = defineProps<{
    recipient?: Object;
}>();


const form = useForm({
    name: props.recipient.name,
    number: props.recipient.number ? parseInt(props.recipient.number) : null,
    number_confirmation: '',
});

const message = ref(null)

onMounted(() => {
    message.value = null
});



const submit = () => {
    form.post(route('recipients.index'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
};
</script>
