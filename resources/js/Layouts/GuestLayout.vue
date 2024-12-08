<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>


    <!-- Section 1 -->
    <section class="w-full bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="w-full px-10 py-16 ml-auto mr-auto bg-white xl:py-32 md:w-3/5 lg:w-4/5 xl:w-4/5">
                <Link href="/" class="mb-8">
                    <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
                </Link>
                <p class="mt-4 text-2xl font-extrabold leading-snug tracking-tight text-left text-gray-900 md:text-4xl">Signup below to try our product today!</p>
                <slot />

                <div class="pt-6 mt-6 border-t border-gray-200">
                    <p class="inline text-sm font-medium text-gray-700">Vous n'avez pas de compte ?</p>
                    <a href="#_" class="inline text-sm font-medium text-purple-700 hover:text-purple-900"> Inscrivez-vous ici.</a>
                </div>
            </div>
            <div class="relative flex flex-col justify-center px-20 py-20 text-purple-700 xl:py-32 md:px-24">

                <div class="absolute inset-0 w-full h-full bg-cover opacity-100" style="background-image:url('https://uploads-ssl.webflow.com/5ec207a448d573153616868a/60e32beb6420a8d3ea4e0dd3_Mesh%2082.jpg')"></div>
                <div class="absolute inset-0 w-full h-full bg-white opacity-70"></div>
                <div class="relative flex items-center justify-start text-xs font-semibold text-purple-500 uppercase tacking-wide">
                    Signup today and gain access to:
                </div>

                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Premium Resources</p>
                        <p class="mt-1 text-gray-500">Gain access to some premium tools and resources to help you take your game to the next level.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Rad Designs &amp; Layouts</p>
                        <p class="mt-1 text-gray-500">You'll also gain access to our amazing design templates and layouts for you to use in your project.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Developer Tools</p>
                        <p class="mt-1 text-gray-500">You will also have access to our developer tools that are designed to save and make you money.</p>
                    </div>
                </div>
                <div class="relative flex mt-8 space-x-3">
                    <svg class="flex-none w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"></path></svg>
                    <div>
                        <p class="text-xl font-medium">Help &amp; Support</p>
                        <p class="mt-1 text-gray-500">Gain access to our premium help and support team that can help you on your journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
