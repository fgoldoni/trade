<template>
    <div class="border-l-4 border-green-400 bg-green-50 p-4 mt-8">
        <div class="flex">
            <div class="shrink-0">
                <ExclamationTriangleIcon class="size-5 text-green-400" aria-hidden="true" />
            </div>
            <div class="ml-3">
                <p class="text-sm text-green-700">
                    {{ message }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
    message: String,
});
</script>
