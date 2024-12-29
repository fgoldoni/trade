<template>
    <TransitionRoot as="template" :show="open">
        <Dialog class="relative z-50 mb-32" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center rounded-full">
                                    <img class="h-12 w-auto text-green-600" :src="$page.props.app.logo" :alt="$page.props.app.name">
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <DialogTitle as="h3" class="text-base font-semibold text-gray-900">Votre liberté financière en un clic!</DialogTitle>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500"><strong>Trade Republic</strong> est une plateforme de courtage en ligne allemande permettant d'acheter et de vendre des actions, ETF, crypto-monnaies, etc. Elle se distingue par des frais réduits et une interface simple, principalement destinée aux investisseurs particuliers.</p>
                                    </div>
                                    <div class="overflow-auto h-60 relative mx-auto flex flex-col">
                                        <ul role="list" class="mt-4 space-y-1 text-sm/6 text-gray-600">
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Prime d'inscription 600 XAF
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Retrait 24h/24, 7j/7
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Cashback de niveau 1 de l'équipe 30%
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Le compte est crédité en 5 minutes.
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                20% de revenu journalier par pack.
                                            </li>
                                        </ul>
                                        <ul role="list" class="mt-4 space-y-1 text-sm/6 text-gray-600">
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Prime d'inscription 600 XAF
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Retrait 24h/24, 7j/7
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Cashback de niveau 1 de l'équipe 30%
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                Le compte est crédité en 5 minutes.
                                            </li>
                                            <li  class="flex gap-x-3">
                                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                                20% de revenu journalier par pack.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6">
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
                            <div class="mt-5 sm:mt-6">
                                <button type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" @click="open = false">Fermer</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { CheckIcon } from '@heroicons/vue/24/outline'

const open = ref(true)
</script>
