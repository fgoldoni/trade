<template>
    <div>
        <ul role="list" class="my-8 space-y-6">
            <li
                v-for="(activityItem, activityItemIdx) in withdrawals"
                :key="activityItem.id"
                class="relative flex gap-x-4"
            >
                <div
                    :class="[
                        activityItemIdx === withdrawals.length - 1
                            ? 'h-6'
                            : '-bottom-6',
                        'absolute left-0 top-0 flex w-6 justify-center',
                    ]"
                >
                    <div class="w-px bg-gray-200" />
                </div>
                <div
                    class="relative flex size-6 flex-none items-center justify-center bg-white"
                >
                    <CheckCircleIcon
                        v-if="true"
                        class="size-6 text-indigo-600"
                        aria-hidden="true"
                    />
                    <div
                        v-else
                        class="size-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"
                    />
                </div>
                <div
                    class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200"
                >
                    <div class="flex justify-between gap-x-4">
                        <div class="py-0.5 text-xs/5 text-gray-500">
                            <span :class="['text-sm font-bold text-blue-500']">
                                {{ activityItem.booking_amount }}
                                {{ $page.props.app.currency }}
                            </span>
                        </div>
                        <span
                            v-if="activityItem.status === 'complete'"
                            class="inline-flex flex-none items-center gap-x-1.5 rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700"
                        >
                            <svg
                                class="size-1.5 fill-green-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            Succès...
                        </span>
                        <span
                            v-if="
                                activityItem.status === 'sent' ||
                                activityItem.status === 'pending'
                            "
                            class="inline-flex flex-none items-center gap-x-1.5 rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700"
                        >
                            <svg
                                class="size-1.5 fill-yellow-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            En cours de traitement...
                        </span>
                        <span
                            v-if="
                                activityItem.status === 'failed' ||
                                activityItem.status === 'rejected' ||
                                activityItem.status === 'expired'
                            "
                            class="inline-flex flex-none items-center gap-x-1.5 rounded-full bg-rose-100 px-2 py-1 text-xs font-medium text-rose-700"
                        >
                            <svg
                                class="size-1.5 fill-rose-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            Le transfert a échoué.
                        </span>
                    </div>
                    <p class="text-sm/6 text-gray-500">
                        {{ activityItem.description }}
                    </p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { CheckCircleIcon } from '@heroicons/vue/24/solid';

defineProps<{
    withdrawals?: Object;
}>();
</script>
