<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import Form from '@/Pages/Recipients/Form.vue';
import { PlusIcon } from '@heroicons/vue/16/solid';
import { Head } from '@inertiajs/vue3';

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
            <Heading title="Compte de retrait"></Heading>

            <Form :recipient="recipient"></Form>

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
