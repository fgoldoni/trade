<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";

defineProps<{
    products?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <AlertSuccessComponent
            :message="$page.props.flash.success"
            v-if="$page.props.flash.success"
        ></AlertSuccessComponent>
        <!-- Section 1 -->
    </GuestLayout>
</template>
