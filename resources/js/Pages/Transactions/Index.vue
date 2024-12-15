<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import WithdrawalComponent from '@/Pages/Transactions/WithdrawalComponent.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    transactions?: Object;
    withdrawals?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="mb-48 p-8">
            <Heading title="Retrait"></Heading>
            <WithdrawalComponent
                :transactions="transactions"
                :withdrawals="withdrawals"
            ></WithdrawalComponent>
        </div>
    </GuestLayout>
</template>
