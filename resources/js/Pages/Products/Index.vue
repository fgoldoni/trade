<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";
import ProductsComponent from "@/Pages/Products/ProductsComponent.vue";
import Heading from "@/Pages/Deposits/Heading.vue";

defineProps<{
    products?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8 mb-48">
            <Heading title="Commandes"></Heading>
            <AlertSuccessComponent
                :message="$page.props.flash.success"
                v-if="$page.props.flash.success"
            ></AlertSuccessComponent>
            <ProductsComponent :products="products"></ProductsComponent>
        </div>
    </GuestLayout>
</template>
