<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import AlertSuccessComponent from "@/Components/AlertSuccessComponent.vue";
import ProductsComponent from "@/Pages/Products/ProductsComponent.vue";
import Heading from "@/Pages/Deposits/Heading.vue";
import HeadingReferralComponent from "@/Pages/Teams/HeadingReferralComponent.vue";
import ReferralComponent from "@/Pages/Teams/ReferralComponent.vue";
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid'
import Invitation from "@/Components/Invitation.vue";


defineProps<{
    total?: Number;
    revenue?: Number;
    referrals?: Object;
}>();
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="p-8 mb-48">
            <HeadingReferralComponent title="Équipe" :total="revenue"></HeadingReferralComponent>
            <Invitation></Invitation>
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <div class="flex items-center">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">Mon Équipe</h3>
                                <p class="text-sm text-gray-500">
                                    <a href="#">{{ referrals.length }} Membres</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ml-4 mt-4 flex shrink-0">
                        <button type="button" class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <span>Total: {{ total }} {{ $page.props.app.currency }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <ReferralComponent title="Équipe" :referrals="referrals"></ReferralComponent>
        </div>
    </GuestLayout>
</template>
