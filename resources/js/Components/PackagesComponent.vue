<script setup lang="ts">

import PackageComponent from "@/Components/PackageComponent.vue";
</script>

<template>
    <div
        :class="`isolate overflow-hidden bg-primary-900 dark:bg-slate-900`"
    >
        <div
            class="mx-auto max-w-7xl px-6 pb-96 pt-24 text-center sm:pt-32 lg:px-8"
        >
            <div class="mx-auto max-w-4xl">
                <h2 class="text-base font-semibold leading-7 text-indigo-400">
                    Nous garantissons votre investissement pendant 90 jours
                </h2>
                <p
                    class="mt-2 text-2xl font-bold tracking-tight text-white sm:text-4xl uppercase"
                >
                    {{ $page.props.app.name }}
                </p>
            </div>
            <div class="relative mt-6">
                <p class="mx-auto max-w-2xl text-lg leading-8 text-white/60">
                    Liste des produits
                </p>
                <svg
                    viewBox="0 0 1208 1024"
                    class="absolute -top-10 left-1/2 -z-10 h-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:-top-12 md:-top-20 lg:-top-12 xl:top-0"
                >
                    <ellipse
                        cx="604"
                        cy="512"
                        fill="url(#6d1bd035-0dd1-437e-93fa-59d316231eb0)"
                        rx="604"
                        ry="512"
                    />
                    <defs>
                        <radialGradient
                            id="6d1bd035-0dd1-437e-93fa-59d316231eb0"
                        >
                            <stop stop-color="#7775D6" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
            </div>
        </div>
        <div :class="`flow-root bg-slate-50 bg-slate-50 dark:bg-slate-800 pb-14 sm:pb-24`">
            <div class="-mt-80">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div
                        class="mx-auto grid max-w-md grid-cols-1 gap-8 lg:max-w-4xl lg:grid-cols-2"
                    >
                        <PackageComponent
                            v-for="item in 4"
                            :key="item"
                            :index="item"
                            :processing="false"
                            :item="item"
                        ></PackageComponent>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
