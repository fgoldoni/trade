<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    products?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <!-- Section 1 -->
    </GuestLayout>
</template>
