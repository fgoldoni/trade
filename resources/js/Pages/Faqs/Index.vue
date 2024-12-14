<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {
    CheckBadgeIcon,
    ExclamationCircleIcon,
} from '@heroicons/vue/24/outline';
import { Head } from '@inertiajs/vue3';

defineProps<{
    faqs?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="py-8 mb-32">
            <div class="mx-auto max-w-7xl px-6 py-24 sm:pt-32 lg:px-8 lg:py-40">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="lg:col-span-5">
                        <h2 class="text-pretty text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Foire aux questions</h2>
                        <p class="mt-4 text-pretty text-base/7 text-gray-600">Vous ne trouvez pas la réponse que vous cherchez ?  <a  :href="`https://wa.me/${$page.props.app.phone}`" class="font-semibold text-indigo-600 hover:text-indigo-500">Contactez notre équipe de support client</a>.</p>
                    </div>
                    <div class="mt-10 lg:col-span-7 lg:mt-0">
                        <dl class="space-y-10">
                            <div v-for="faq in faqs" :key="faq.question">
                                <dt class="text-base/7 font-semibold text-gray-900">{{ faq.question }}</dt>
                                <dd class="mt-2 text-base/7 text-gray-600">{{ faq.answer }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
