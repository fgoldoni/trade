<script setup lang="ts">
import { MoonIcon, SunIcon } from '@heroicons/vue/24/outline';

import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);

interface Props {
    scrolledFromTop: boolean;
}

const props = defineProps<Props>();
</script>

<template>
    <button
        type="button"
        @click="toggleDark()"
        :class="[
            scrolledFromTop ? 'scale-75' : 'scale-100',
            'me-2 inline-flex items-center rounded-lg p-2.5 text-center text-sm font-medium text-primary-700 transition duration-700 hover:bg-primary-700 hover:text-white focus:outline-none dark:text-primary-500 dark:hover:bg-slate-800 dark:hover:text-white',
        ]"
    >
        <MoonIcon v-if="isDark" class="h-5 w-5 text-white" aria-hidden="true" />
        <SunIcon v-else class="h-5 w-5 text-white" aria-hidden="true" />
    </button>
</template>

<style scoped></style>
