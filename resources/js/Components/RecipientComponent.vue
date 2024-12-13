<template>
    <div class="mt-8 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-base font-semibold text-gray-900">
                Compte de retrait
            </h3>
            <div class="mt-5">
                <div
                    class="rounded-md bg-gray-50 px-6 py-5 dark:bg-gray-100 sm:flex sm:items-start sm:justify-between"
                >
                    <h4 class="sr-only">Visa</h4>
                    <div class="sm:flex sm:items-start">
                        <img
                            class="h-8 w-auto sm:h-6 sm:shrink-0"
                            :src="'/images/' + recipient.channel + '.png'"
                            :alt="recipient.account"
                        />
                        <div class="mt-3 sm:ml-4 sm:mt-0">
                            <div class="text-sm font-medium text-gray-900">
                                {{ recipient.account }}
                            </div>
                            <div
                                class="mt-1 text-sm text-gray-600 sm:flex sm:items-center"
                            >
                                <div>{{ recipient.number }}</div>
                                <span
                                    class="hidden sm:mx-2 sm:inline"
                                    aria-hidden="true"
                                    >&middot;</span
                                >
                                <div class="mt-1 sm:mt-0">
                                    {{ recipient.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="inline-flex items-center py-2 text-sm font-semibold text-gray-900"
                    >
                        <Link
                            :href="route('recipients.index')"
                            :class="`font-medium text-primary-700 underline hover:text-primary-600`"
                        >
                            <span>
                                {{ __('Modifier') }}
                            </span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
    recipient: Object,
});
</script>
