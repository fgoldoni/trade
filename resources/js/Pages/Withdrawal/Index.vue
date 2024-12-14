<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import RecipientMissingAlert from '@/Pages/Withdrawal/RecipientMissingAlert.vue';
import WithdrawalFormComponent from '@/Pages/Withdrawal/WithdrawalFormComponent.vue';
import { Head } from '@inertiajs/vue3';
import HighlightsComponent from "@/Components/HighlightsComponent.vue";

defineProps<{
    recipient?: Object;
}>();

const highlights = [
    {
        description:
            'Le montant minimum de retrait est fixé à 600 XAF.',
    },
    {
        description:
            'Des frais de traitement de 15 % seront appliqués pour le retrait.',
    },
    {
        description:
            'L’ordre de retrait est traité automatiquement et les comptes sont généralement crédités en moins de 5 minutes. En cas de problèmes avec Orange ou MTN, l’opération peut être traitée manuellement et prendre jusqu’à 24 heures.',
    },
    {
        description:
            'Il n\'y a aucune limite de retraits par jour. En cas d\'échec, vous pouvez soumettre une nouvelle demande ou utiliser un autre compte.',
    },
    {
        description:
            'Les retraits sont disponibles 24h/24, 7 jours sur 7, y compris pendant les jours fériés.',
    },
    {
        description:
            'Conditions de retrait : Il est nécessaire d\'acheter au moins un pack pour activer la fonctionnalité de retrait.',
    },
];
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading title="Retrait"></Heading>
            <RecipientMissingAlert
                v-if="!recipient.number"
            ></RecipientMissingAlert>
            <WithdrawalFormComponent
                v-else
                :recipient="recipient"
            ></WithdrawalFormComponent>
            <HighlightsComponent :highlights="highlights"></HighlightsComponent>
        </div>
    </GuestLayout>
</template>
