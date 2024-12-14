<script setup lang="ts">

import {PlusIcon} from "@heroicons/vue/16/solid";

const props = defineProps<{
    highlights?: Object;
}>();

</script>

<template>
    <div class="mb-32 mt-4">
        <ul class="mt-3 space-y-3">
            <li
                v-for="highlight in highlights"
                :key="highlight.description"
                :data-disabled="highlight.disabled"
                class="group flex items-start gap-4 text-sm/6 text-gray-600 data-[disabled]:text-gray-400"
            >
                    <span class="inline-flex h-6 items-center">
                        <PlusIcon
                            class="size-4 fill-gray-400 group-data-[disabled]:fill-gray-300"
                            aria-hidden="true"
                        />
                    </span>
                <span v-if="highlight.disabled" class="sr-only"
                >Not included:</span
                >
                {{ highlight.description }}
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
