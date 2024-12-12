<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import Heading from "@/Pages/Deposits/Heading.vue";
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'
import RecipientMissingAlert from "@/Pages/Withdrawal/RecipientMissingAlert.vue";
import {PlusIcon} from "@heroicons/vue/16/solid";
import Form from "@/Pages/Recipients/Form.vue";

defineProps<{
    recipient?: Object;
}>();

const highlights = [
    {
        description:
            'Le montant minimum de recharge est de 5 000 XAF. Si le montant est inférieur à 5 000 XAF, il ne sera pas crédité sur le solde de votre compte.',
    },
    {
        description:
            'La recharge s’effectue automatiquement et sera disponible sur le compte une fois le paiement finalisé.',
    },
    {
        description:
            'En cas de problème de recharge, nous vous invitons à transmettre le message de confirmation de paiement au service client.',
    },
];

</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading  title="Compte de retrait"></Heading>

            <div v-if="recipient.number" class="shadow sm:rounded-lg mt-8">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-base font-semibold text-gray-900">Compte de retrait</h3>
                    <div class="mt-5">
                        <div class="rounded-md bg-gray-50 dark:bg-gray-100 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                            <h4 class="sr-only">Visa</h4>
                            <div class="sm:flex sm:items-start">
                                <img class="h-8 w-auto sm:h-6 sm:shrink-0" :src="'/images/' + recipient.channel + '.png'" :alt="recipient.account">
                                <div class="mt-3 sm:ml-4 sm:mt-0">
                                    <div class="text-sm font-medium text-gray-900">{{ recipient.account }}</div>
                                    <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                        <div>{{ recipient.number }}</div>
                                        <span class="hidden sm:mx-2 sm:inline" aria-hidden="true">&middot;</span>
                                        <div class="mt-1 sm:mt-0">{{ recipient.name }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center  px-3 py-2 text-sm font-semibold text-gray-900">
                                <a
                                    :href="`https://wa.me/${$page.props.app.phone}`"
                                    :class="`font-medium text-primary-700 underline hover:text-primary-600`"
                                >
                    <span>
                        {{ __('Veuillez cliquer ici pour contacter le service client') }}
                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <Form v-else="recipient"></Form>

            <div class="mb-32 mt-4">
                <ul class="mt-3 space-y-3">
                    <li
                        v-for="highlight in highlights"
                        :key="highlight.description"
                        :data-disabled="highlight.disabled"
                        class="group flex items-start gap-4 text-sm/6 text-gray-600 data-[disabled]:text-gray-400"
                    >
                    <span class="inline-flex h-6 items-center">
                        <PlusIcon
                            class="size-4 fill-gray-400 group-data-[disabled]:fill-gray-300"
                            aria-hidden="true"
                        />
                    </span>
                        <span v-if="highlight.disabled" class="sr-only"
                        >Not included:</span
                        >
                        {{ highlight.description }}
                    </li>
                </ul>
            </div>
        </div>
    </GuestLayout>
</template>
