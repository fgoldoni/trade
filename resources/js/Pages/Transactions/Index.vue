<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import RecipientMissingAlert from '@/Pages/Withdrawal/RecipientMissingAlert.vue';
import WithdrawalFormComponent from '@/Pages/Withdrawal/WithdrawalFormComponent.vue';
import { PlusIcon } from '@heroicons/vue/16/solid';
import { Head } from '@inertiajs/vue3';
import WithdrawalComponent from "@/Pages/Transactions/WithdrawalComponent.vue";

defineProps<{
    transactions?: Object;
    withdrawals?: Object;
}>();

</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8 mb-48">
            <Heading title="Retrait"></Heading>
            <WithdrawalComponent :transactions="transactions" :withdrawals="withdrawals"></WithdrawalComponent>
        </div>
    </GuestLayout>
</template>
