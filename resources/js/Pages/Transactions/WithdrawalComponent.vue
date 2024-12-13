<template>

    <!-- Section 1 -->
    <section class="relative w-full bg-white">
        <div class="absolute inset-0 w-full h-full opacity-25 sm:opacity-50">
            <svg class="absolute top-0 right-0 w-auto h-full opacity-75" viewBox="0 0 150 350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path d="M0 0h50v50H0z"></path><path d="M0 0h50v50H0z"></path><path d="M0 0h150v150H0z"></path></defs><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><g fill="#DEB9FF" fill-rule="nonzero"><path d="M25 25c13.807 0 25-11.193 25-25H0c0 13.807 11.193 25 25 25z"></path></g><g transform="translate(0 100)"><mask fill="#fff"><use xlink:href="#path-1"></use></mask><path d="M25 0c13.807 0 25 11.193 25 25S38.807 50 25 50H0V0h25z" fill="#F9C7FF" mask="url(#mask-2)"></path></g><g transform="translate(100 100)"><mask fill="#fff"><use xlink:href="#path-3"></use></mask><path d="M25 25c13.807 0 25-11.193 25-25H0c0 13.807 11.193 25 25 25z" fill="#93FFFD" fill-rule="nonzero" mask="url(#mask-4)"></path></g><g transform="translate(0 200)"><mask fill="#fff"><use xlink:href="#path-5"></use></mask><path d="M75 75c0 41.421 33.579 75 75 75V0c-41.421 0-75 33.579-75 75z" fill="#93FFFD" fill-rule="nonzero" mask="url(#mask-6)"></path></g></g></g></svg>
            <svg class="absolute top-0 left-0 w-auto h-full opacity-30" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path d="M0 0h50v50H0z"></path><path d="M0 0h50v50H0z"></path></defs><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="matrix(-1 0 0 1 150 0)"><g transform="translate(0 25)" fill="#93FFFD" fill-rule="nonzero"><path d="M25 0C11.193 0 0 11.193 0 25h50C50 11.193 38.807 0 25 0z"></path></g><path d="M25 50C11.193 50 0 38.807 0 25S11.193 0 25 0h25v50H25z" transform="translate(100)" fill="#DEB9FF"></path><g transform="translate(0 100)"><mask fill="#fff"><use xlink:href="#path-1"></use></mask><path d="M25 50C11.193 50 0 38.807 0 25S11.193 0 25 0h25v50H25z" fill="#B3EBFF" mask="url(#mask-2)"></path></g><g transform="translate(100 200)"><mask fill="#fff"><use xlink:href="#path-3"></use></mask><path d="M25 50C11.193 50 0 38.807 0 25S11.193 0 25 0h25v50H25z" fill="#93FFFD" mask="url(#mask-4)"></path></g></g></g></svg>
        </div>
        <div class="relative w-full px-8 pt-16 pb-16 ml-auto mr-auto bg-top bg-cover sm:max-w-xl md:max-w-full md:px-24 lg:px-8 lg:py-24 lg:pb-32">
            <div class="max-w-xl mb-10 bg-top bg-cover mx-auto text-center lg:max-w-2xl md:mb-12">
                <p class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider uppercase bg-primary-600 rounded-full text-primary-50">transactions</p>
            </div>
            <div class="flow-root">
                <ul role="list" class="-mb-8">
                    <li v-for="(event, eventIdx) in transactions" :key="event.id">
                        <div class="relative pb-8">
                            <span v-if="eventIdx !== transactions.length - 1" class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true" />
                            <div class="relative flex space-x-3">
                                <div>
              <span :class="[event.type === 'inc' ? 'bg-green-500' : 'bg-rose-500', 'flex size-8 items-center justify-center rounded-full ring-8 ring-white']">
                <CircleStackIcon v-if="event.notes ==='Dépôt'" class="size-5 text-white" aria-hidden="true" />
                <BanknotesIcon v-if="event.notes ==='Retrait'" class="size-5 text-white" aria-hidden="true" />
                <GiftIcon v-if="event.notes?.includes('parrainage')" class="size-5 text-white" aria-hidden="true" />
              </span>
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            {{ event.notes }}
                                            <a href="javascript:;" :class="[event.type === 'inc' ? 'text-green-900' : 'text-rose-900', 'font-medium']">
                                                <span v-if="event.type === 'inc'"> + </span> <span v-if="event.type === 'dec'"> - </span> {{ event.value }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="whitespace-nowrap text-right text-sm text-gray-500">
                                        <time :datetime="event.datetime">{{ event.created_at }}</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>


</template>

<script setup lang="ts">
import { CheckIcon, HandThumbUpIcon, UserIcon, GiftIcon, BanknotesIcon, CircleStackIcon } from '@heroicons/vue/20/solid'

defineProps<{
    transactions?: Object;
}>();

const timeline = [
    {
        id: 1,
        content: 'Applied to',
        target: 'Front End Developer',
        href: '#',
        date: 'Sep 20',
        datetime: '2020-09-20',
        icon: UserIcon,
        iconBackground: 'bg-gray-400',
    },
    {
        id: 2,
        content: 'Advanced to phone screening by',
        target: 'Bethany Blake',
        href: '#',
        date: 'Sep 22',
        datetime: '2020-09-22',
        icon: HandThumbUpIcon,
        iconBackground: 'bg-blue-500',
    },
    {
        id: 3,
        content: 'Completed phone screening with',
        target: 'Martha Gardner',
        href: '#',
        date: 'Sep 28',
        datetime: '2020-09-28',
        icon: CheckIcon,
        iconBackground: 'bg-green-500',
    },
    {
        id: 4,
        content: 'Advanced to interview by',
        target: 'Bethany Blake',
        href: '#',
        date: 'Sep 30',
        datetime: '2020-09-30',
        icon: HandThumbUpIcon,
        iconBackground: 'bg-blue-500',
    },
    {
        id: 5,
        content: 'Completed interview with',
        target: 'Katherine Snyder',
        href: '#',
        date: 'Oct 4',
        datetime: '2020-10-04',
        icon: CheckIcon,
        iconBackground: 'bg-green-500',
    },
]
</script>
