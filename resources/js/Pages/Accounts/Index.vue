<script setup lang="ts">
import HighlightsComponent from '@/Components/HighlightsComponent.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import RecipientMissingAlert from '@/Pages/Withdrawal/RecipientMissingAlert.vue';
import WithdrawalFormComponent from '@/Pages/Withdrawal/WithdrawalFormComponent.vue';
import { Head } from '@inertiajs/vue3';
import Invitation from "@/Components/Invitation.vue";

defineProps<{
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading title="Retrait"></Heading>
            <Invitation></Invitation>
        </div>
    </GuestLayout>
</template>
