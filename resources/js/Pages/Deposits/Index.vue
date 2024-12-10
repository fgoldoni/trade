<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import Heading from "@/Pages/Deposits/Heading.vue";
import Form from "@/Pages/Deposits/Form.vue";




</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading></Heading>
            <Form></Form>
        </div>
    </GuestLayout>
</template>
