<template>
    <div class="bg-slate-50 dark:bg-slate-800">
        <div aria-hidden="true" class="relative">
            <img
                :src="$page.props.app.image"
                :alt="$page.props.app.name"
                class="h-[18rem] w-full object-cover object-center sm:h-[32rem]"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-white dark:from-slate-800"
            />
        </div>

        <div
            class="relative mx-auto -mt-32 max-w-7xl px-4 pb-16 sm:px-6 sm:pb-24 lg:px-8"
        >
            <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
                <h2
                    class="rounded border border-primary-300 bg-primary-50 py-4 text-2xl font-bold shadow-xl"
                >
                    <span class="text-blue-900 dark:text-blue-200"
                        >Solde: {{ $page.props.auth.user.balance }}
                        {{ $page.props.app.currency }}</span
                    ><br />
                    <TypingEffect
                        :items="[
                            'Retraits 24h/24, 7 jours sur 7',
                            '20% de revenus journaliers',
                            '30% de bonus de parrainage',
                            'Retraits quotidiens illimités',
                            '90 jours d\'investissement',
                        ]"
                    ></TypingEffect
                    >&nbsp;
                </h2>

                <div
                    class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-center"
                >
                    <a
                        :href="`${$page.props.app.service}`"
                        class="mb-2 me-2 flex items-center justify-center rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-200 dark:focus:ring-gray-800"
                    >
                        <svg
                            class="-ms-1 mb-1 me-2 h-4 w-8 text-sky-500"
                            fill="currentColor"
                            viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"
                            ></path>
                        </svg>
                        Service clientèle
                    </a>

                    <a
                        :href="`${$page.props.app.group}`"
                        class="mb-2 me-2 flex items-center justify-center rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-200 dark:focus:ring-gray-800"
                    >
                        <svg
                            class="-ms-1 mb-1 me-2 h-4 w-8 text-sky-500"
                            fill="currentColor"
                            viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"
                            ></path>
                        </svg>
                        Groupe Telegram
                    </a>
                </div>
                <AlertComponent
                    :message="$page.props.flash.error"
                    v-if="$page.props.flash.error"
                ></AlertComponent>
            </div>

            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">
import TypingEffect from '@/Components/TypingEffect.vue';
import { onMounted } from 'vue';
import AlertComponent from "@/Components/AlertComponent.vue";

onMounted(async () => {});
</script>
