<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";
import ProductsComponent from "@/Pages/Products/ProductsComponent.vue";
import Heading from "@/Pages/Deposits/Heading.vue";
import HeadingReferralComponent from "@/Pages/Teams/HeadingReferralComponent.vue";
import ReferralComponent from "@/Pages/Teams/ReferralComponent.vue";

defineProps<{
    total?: Number;
    revenue?: Number;
    referrals?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <HeadingReferralComponent title="Équipe" :total="total"></HeadingReferralComponent>
            <ReferralComponent title="Équipe" :total="total"></ReferralComponent>
        </div>
    </GuestLayout>
</template>
