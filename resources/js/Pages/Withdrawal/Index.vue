<script setup lang="ts">
import HighlightsComponent from '@/Components/HighlightsComponent.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import RecipientMissingAlert from '@/Pages/Withdrawal/RecipientMissingAlert.vue';
import WithdrawalFormComponent from '@/Pages/Withdrawal/WithdrawalFormComponent.vue';
import { Head } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";

defineProps<{
    recipient?: Object;
}>();

const highlights = [
    {
        description: 'Les retraits sont disponibles 24h/24, 7 jours sur 7, y compris pendant les jours fériés.',
    },
    {
        description:
            'Des frais de traitement de 20 % seront appliqués pour le retrait.',
    },
    {
        description: 'Le montant minimum de retrait est fixé à 600 XAF.',
    },
    {
        description:
            'Les comptes sont crédités en moins de 5 minutes, sauf en cas de problème chez Orange ou MTN, où cela peut prendre jusqu\'à 24 heures.',
    },
    {
        description:
            "Il n'y a aucune limite de retraits par jour. En cas d'échec, vous pouvez soumettre une nouvelle demande ou utiliser un autre compte.",
    },
    {
        description:
            "Conditions de retrait : Il est nécessaire d'acheter au moins un pack pour activer la fonctionnalité de retrait.",
    },
];
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading title="Retrait"></Heading>
            <AlertSuccessComponent
                :message="$page.props.flash.success"
                v-if="$page.props.flash.success"
            ></AlertSuccessComponent>
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
