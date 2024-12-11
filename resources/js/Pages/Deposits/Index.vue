<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Form from '@/Pages/Deposits/Form.vue';
import Heading from '@/Pages/Deposits/Heading.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8">
            <Heading title="Dépôt"></Heading>
            <Form></Form>
        </div>
    </GuestLayout>
</template>
