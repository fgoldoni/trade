<template>
    <div class="bg-slate-50 dark:bg-slate-800">
        <div aria-hidden="true" class="relative">
            <img
                :src="$page.props.app.image"
                :alt="$page.props.app.name"
                class="h-[18rem] sm:h-[32rem] w-full object-cover object-center"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-white dark:from-slate-800"
            />
        </div>

        <div
            class="relative mx-auto -mt-12 max-w-7xl px-4 pb-16 sm:px-6 sm:pb-24 lg:px-8"
        >
            <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
                <h2
                    class="text-2xl font-bold dark:text-white text-slate-800 uppercase"
                >
                    {{ $page.props.app.name }} {{ __("labels.presents")
                    }}<br />
                    <TypingEffect
                        :items="['demo']"
                    ></TypingEffect
                    >&nbsp;
                </h2>
                <p class="mt-4 text-gray-500">
                    {{ $page.props.app.description }}
                </p>
            </div>

            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import TypingEffect from "@/Components/TypingEffect.vue";
import { PhoneArrowUpRightIcon } from "@heroicons/vue/20/solid";

onMounted(async () => {});
</script>
