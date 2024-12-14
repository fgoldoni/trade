<template>
    <div class="p-8">
        <nav class="isolate flex divide-x divide-gray-200 rounded-lg shadow" aria-label="Tabs">
            <button type="button" v-for="(tab, tabIdx) in tabs" :key="tab.name" @click="current = tab.name" :class="[current === tab.name ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700', tabIdx === 0 ? 'rounded-l-lg' : '', tabIdx === tabs.length - 1 ? 'rounded-r-lg' : '', 'group relative min-w-0 flex-1 overflow-hidden bg-white px-4 py-4 text-center text-sm font-medium hover:bg-gray-50 focus:z-10']" :aria-current="tab.current ? 'page' : undefined">
                <span>{{ tab.name }}</span>
                <span aria-hidden="true" :class="[current === tab.name ? 'bg-indigo-500' : 'bg-transparent', 'absolute inset-x-0 bottom-0 h-0.5']" />
            </button>
        </nav>
        <ul role="list" class="space-y-6 my-8" v-if="current === 'Tous'">
            <li v-for="(activityItem, activityItemIdx) in transactions" :key="activityItem.id" class="relative flex gap-x-4">
                <div :class="[activityItemIdx === transactions.length - 1 ? 'h-6' : '-bottom-6', 'absolute left-0 top-0 flex w-6 justify-center']">
                    <div class="w-px bg-gray-200" />
                </div>
                <div class="relative flex size-6 flex-none items-center justify-center bg-white">
                    <CheckCircleIcon v-if="true" class="size-6 text-indigo-600" aria-hidden="true" />
                    <div v-else class="size-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300" />
                </div>
                <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                    <div class="flex justify-between gap-x-4">
                        <div class="py-0.5 text-xs/5 text-gray-500">
                        <span :class="[activityItem.type === 'inc' ? 'text-green-900' : 'text-rose-900', 'font-bold']">
                            <span v-if="activityItem.type === 'inc'"> + </span>
                            <span v-else> - </span>
                            {{ activityItem.value }} {{ $page.props.app.currency }}
                        </span>
                        </div>
                        <time :datetime="activityItem.created_at" class="flex-none py-0.5 text-xs/5 text-gray-500">
                            {{ format(parseISO(activityItem.created_at), "dd. MMM yyyy  H:mm", { locale: fr }) }}</time>
                    </div>
                    <p class="text-sm/6 text-gray-500">{{ activityItem.notes }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/24/solid'
const tabs = [
    { name: 'Retraits', href: '#', current: true },
    { name: 'Tous', href: '#', current: false },
]
import parseISO from "date-fns/parseISO";
import format from "date-fns/format";
import { fr } from "date-fns/locale";

defineProps<{
    transactions?: Object;
}>();

const current = ref(tabs[0].name)
</script>

