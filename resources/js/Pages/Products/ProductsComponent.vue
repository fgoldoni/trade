<template>
    <ul role="list" class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <li v-for="person in products" :key="person.email" class="col-span-1 divide-y divide-gray-100 rounded-lg bg-slate-300 shadow-xl">
            <div class="flex w-full items-center justify-between space-x-6 p-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="truncate text-sm font-medium text-gray-900">Revenu quotidien</h3>
                        <span class="uppercase inline-flex shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                            {{ person.daily_income }} {{ $page.props.app.currency }}
                        </span>
                    </div>
                    <p class="mt-1 truncate text-sm text-gray-500">{{ person.name }} ({{ person.price }}) acheté le {{
                            format(
                                parseISO(person.pivot.created_at),
                                'dd. MMM yyyy',
                                { locale: fr },
                            )
                        }}</p>
                </div>
                <img class="size-10 shrink-0 rounded-full bg-gray-300" src="/images/awards/award-6.svg" alt="" />
            </div>
            <div>
                <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="flex w-0 flex-1">
                        <a href="javascript:;" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                            {{ person.pivot.quantity }} / {{ person.days }}
                        </a>
                    </div>
                    <div class="-ml-px flex w-0 flex-1">
                        <a href="javascript:;" class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                            Total: {{ person.pivot.quantity * ((person.price/100) * 10) }} {{ $page.props.app.currency }}
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script setup lang="ts">
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid'
import format from 'date-fns/format';
import { fr } from 'date-fns/locale';
import parseISO from 'date-fns/parseISO';
import formatDistanceToNow from 'date-fns/formatDistanceToNow';
import { ref } from 'vue';

const props = defineProps({
    products: Object,
});

const people = [
    {
        name: 'Jane Cooper',
        title: 'Regional Paradigm Technician',
        role: 'Admin',
        email: 'janecooper@example.com',
        telephone: '+1-202-555-0170',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
    // More people...
]
</script>
