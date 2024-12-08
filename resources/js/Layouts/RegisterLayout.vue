<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { XMarkIcon } from '@heroicons/vue/20/solid'

import { Link } from '@inertiajs/vue3';
</script>



<template>
    <!-- Section 1 -->
    <section class=" w-full bg-white">
        <div class="relative isolate flex items-center gap-x-6 overflow-hidden bg-primary-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
            <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
                <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)" />
            </div>
            <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
                <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)" />
            </div>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                <p class="text-sm/6 text-primary-900">
                    <strong class="font-semibold">GeneriCon 2023</strong><svg viewBox="0 0 2 2" class="mx-2 inline size-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>Join us in Denver from June 7 – 9 to see what’s coming next.
                </p>
                <a href="#" class="flex-none rounded-full bg-primary-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-primary-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-900">Register now <span aria-hidden="true">&rarr;</span></a>
            </div>
            <div class="flex flex-1 justify-end">
                <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                    <span class="sr-only">Dismiss</span>
                    <XMarkIcon class="size-5 text-primary-900" aria-hidden="true" />
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="w-full px-10 pt-16 ml-auto mr-auto bg-white xl:py-32 md:w-3/5 lg:w-4/5 xl:w-4/5">
                <Link href="/" class="mb-8">
                    <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
                </Link>
                <h1 class="mt-4 text-3xl font-extrabold leading-none tracking-normal text-gray-900 md:text-4xl md:tracking-tight">
                    <span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">Bonus de parrainage: 30 %</span>
                </h1>
                <slot />
            </div>
            <div class="relative flex flex-col justify-center p-10 text-primary-700">

                <div class="absolute inset-0 w-full h-full bg-cover opacity-100" style="background-image:url('https://uploads-ssl.webflow.com/5ec207a448d573153616868a/60e32beb6420a8d3ea4e0dd3_Mesh%2082.jpg')"></div>
                <div class="absolute inset-0 w-full h-full bg-white opacity-70"></div>
                <div class="relative flex items-center justify-start text-xs font-semibold text-primary-500 uppercase tacking-wide">
                    Comment ça fonctionne
                </div>

                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Bonus de bienvenue.</p>
                        <p class="mt-1 text-gray-500">Rejoins Trade Republic. Accepte l'invitation pour recevoir 1000 XAF de bonus de bienvenue.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Gain quotidienne</p>
                        <p class="mt-1 text-gray-500">Gain quotidien de 20 % sur l'investissement.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Retrait (Premier retrait gratuit)</p>
                        <p class="mt-1 text-gray-500">Retrait minimum de 1 100 XAF, du lundi au dimanche.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Bonus de parrainage : 30 %</p>
                        <p class="mt-1 text-gray-500">Plus vous invitez, plus vous gagnez.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
