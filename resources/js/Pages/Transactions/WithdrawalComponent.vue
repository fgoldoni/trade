<template>
    <ul role="list" class="space-y-6 my-8">
        <li v-for="(activityItem, activityItemIdx) in transactions" :key="activityItem.id" class="relative flex gap-x-4">
            <div :class="[activityItemIdx === activity.length - 1 ? 'h-6' : '-bottom-6', 'absolute left-0 top-0 flex w-6 justify-center']">
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
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/24/solid'
import {
    FaceFrownIcon,
    FaceSmileIcon,
    FireIcon,
    HandThumbUpIcon,
    HeartIcon,
    PaperClipIcon,
    XMarkIcon,
} from '@heroicons/vue/20/solid'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon,UserIcon, GiftIcon, BanknotesIcon, CircleStackIcon } from '@heroicons/vue/20/solid'

import parseISO from "date-fns/parseISO";
import format from "date-fns/format";
import addDays from "date-fns/addDays";
import { fr } from "date-fns/locale";

defineProps<{
    transactions?: Object;
}>();

const activity = [
    { id: 1, type: 'created', person: { name: 'Chelsea Hagon' }, date: '7d ago', dateTime: '2023-01-23T10:32' },
    { id: 2, type: 'edited', person: { name: 'Chelsea Hagon' }, date: '6d ago', dateTime: '2023-01-23T11:03' },
    { id: 3, type: 'sent', person: { name: 'Chelsea Hagon' }, date: '6d ago', dateTime: '2023-01-23T11:24' },
    {
        id: 4,
        type: 'commented',
        person: {
            name: 'Chelsea Hagon',
            imageUrl:
                'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
        comment: 'Called client, they reassured me the invoice would be paid by the 25th.',
        date: '3d ago',
        dateTime: '2023-01-23T15:56',
    },
    { id: 5, type: 'viewed', person: { name: 'Alex Curren' }, date: '2d ago', dateTime: '2023-01-24T09:12' },
    { id: 6, type: 'paid', person: { name: 'Alex Curren' }, date: '1d ago', dateTime: '2023-01-24T09:20' },
]
const moods = [
    { name: 'Excited', value: 'excited', icon: FireIcon, iconColor: 'text-white', bgColor: 'bg-red-500' },
    { name: 'Loved', value: 'loved', icon: HeartIcon, iconColor: 'text-white', bgColor: 'bg-pink-400' },
    { name: 'Happy', value: 'happy', icon: FaceSmileIcon, iconColor: 'text-white', bgColor: 'bg-green-400' },
    { name: 'Sad', value: 'sad', icon: FaceFrownIcon, iconColor: 'text-white', bgColor: 'bg-yellow-400' },
    { name: 'Thumbsy', value: 'thumbsy', icon: HandThumbUpIcon, iconColor: 'text-white', bgColor: 'bg-blue-500' },
    { name: 'I feel nothing', value: null, icon: XMarkIcon, iconColor: 'text-gray-400', bgColor: 'bg-transparent' },
]

const selected = ref(moods[5])
</script>

