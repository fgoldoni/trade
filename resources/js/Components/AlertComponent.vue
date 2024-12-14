<template>
    <div class="mt-8 border-l-4 border-rose-400 bg-rose-50 p-4">
        <div class="flex">
            <div class="shrink-0">
                <ExclamationTriangleIcon
                    class="size-5 text-rose-400"
                    aria-hidden="true"
                />
            </div>
            <div class="ml-3">
                <p class="text-sm text-rose-700">
                    {{ message }}
                    {{ ' ' }}
                    <a
                        :href="`https://wa.me/${$page.props.app.phone}`"
                        :class="`font-medium text-primary-700 underline hover:text-primary-600`"
                    >
<!--                        <span>-->
<!--                            {{-->
<!--                                __(-->
<!--                                    'Veuillez cliquer ici pour contacter le service client',-->
<!--                                )-->
<!--                            }}-->
<!--                        </span>-->
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ExclamationTriangleIcon } from '@heroicons/vue/20/solid';

const props = defineProps({
    message: String,
});
</script>
