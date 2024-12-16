<template>
    <div>
        <div>
            <nav class="sm:hidden" aria-label="Back">
                <Link
                    :href="route('home')"
                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700"
                >
                    <ChevronLeftIcon
                        class="-ml-1 mr-1 size-5 shrink-0 text-gray-400"
                        aria-hidden="true"
                    />
                    Retour
                </Link>
            </nav>
            <nav class="hidden sm:flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex">
                            <Link
                                :href="route('home')"
                                href="#"
                                class="text-sm font-medium text-gray-500 hover:text-gray-700"
                            >Accueil</Link
                            >
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <ChevronRightIcon
                                class="size-5 shrink-0 text-gray-400"
                                aria-hidden="true"
                            />
                            <a
                                href="javascript:;"
                                class="ml-4 text-sm font-medium text-gray-400"
                            >
                                {{ title }}</a
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mx-auto w-full pt-6">
            <div
                class="relative overflow-hidden rounded border border-blue-100 px-6 py-8 lg:flex lg:flex-col lg:items-center lg:justify-between lg:p-16"
            >
                <!-- Left Pattern -->
                <div
                    class="absolute left-0 top-0 z-10 -ml-4 -mt-4 ml-3 mt-1 hidden h-full -rotate-90 transform p-4 lg:block"
                >
                    <svg
                        class="h-full w-auto fill-current text-blue-50"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 390 390"
                    >
                        <defs></defs>
                        <g fill-rule="nonzero">
                            <circle cx="10" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="10" r="9.5"></circle>
                            <circle cx="84" cy="10" r="9.5"></circle>
                            <circle cx="121" cy="10" r="9.5"></circle>
                            <circle cx="158" cy="10" r="9.5"></circle>
                            <circle cx="195" cy="10" r="9.5"></circle>
                            <circle cx="232" cy="10" r="9.5"></circle>
                            <circle cx="269" cy="10" r="9.5"></circle>
                            <circle cx="306" cy="10" r="9.5"></circle>
                            <circle cx="343" cy="10" r="9.5"></circle>
                            <circle cx="380" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="47" r="9.5"></circle>
                            <circle cx="121" cy="47" r="9.5"></circle>
                            <circle cx="158" cy="47" r="9.5"></circle>
                            <circle cx="195" cy="47" r="9.5"></circle>
                            <circle cx="232" cy="47" r="9.5"></circle>
                            <circle cx="269" cy="47" r="9.5"></circle>
                            <circle cx="306" cy="47" r="9.5"></circle>
                            <circle cx="343" cy="47" r="9.5"></circle>
                            <circle cx="380" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="84" r="9.5"></circle>
                            <circle cx="158" cy="84" r="9.5"></circle>
                            <circle cx="195" cy="84" r="9.5"></circle>
                            <circle cx="232" cy="84" r="9.5"></circle>
                            <circle cx="269" cy="84" r="9.5"></circle>
                            <circle cx="306" cy="84" r="9.5"></circle>
                            <circle cx="343" cy="84" r="9.5"></circle>
                            <circle cx="380" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="121" r="9.5"></circle>
                            <circle cx="195" cy="121" r="9.5"></circle>
                            <circle cx="232" cy="121" r="9.5"></circle>
                            <circle cx="269" cy="121" r="9.5"></circle>
                            <circle cx="306" cy="121" r="9.5"></circle>
                            <circle cx="343" cy="121" r="9.5"></circle>
                            <circle cx="380" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="158" r="9.5"></circle>
                            <circle cx="232" cy="158" r="9.5"></circle>
                            <circle cx="269" cy="158" r="9.5"></circle>
                            <circle cx="306" cy="158" r="9.5"></circle>
                            <circle cx="343" cy="158" r="9.5"></circle>
                            <circle cx="380" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="195" r="9.5"></circle>
                            <circle cx="269" cy="195" r="9.5"></circle>
                            <circle cx="306" cy="195" r="9.5"></circle>
                            <circle cx="343" cy="195" r="9.5"></circle>
                            <circle cx="380" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="232" r="9.5"></circle>
                            <circle cx="306" cy="232" r="9.5"></circle>
                            <circle cx="343" cy="232" r="9.5"></circle>
                            <circle cx="380" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="269" r="9.5"></circle>
                            <circle cx="343" cy="269" r="9.5"></circle>
                            <circle cx="380" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="306" r="9.5"></circle>
                            <circle cx="380" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="380" r="9.5"></circle>
                        </g>
                    </svg>
                </div>

                <!-- Right Pattern -->
                <div
                    class="absolute bottom-0 right-0 z-10 -mb-4 -mr-4 ml-3 mt-1 hidden h-full rotate-90 transform p-4 md:block"
                >
                    <svg
                        class="h-full w-auto fill-current text-blue-50"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 390 390"
                    >
                        <defs></defs>
                        <g fill-rule="nonzero">
                            <circle cx="10" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="10" r="9.5"></circle>
                            <circle cx="84" cy="10" r="9.5"></circle>
                            <circle cx="121" cy="10" r="9.5"></circle>
                            <circle cx="158" cy="10" r="9.5"></circle>
                            <circle cx="195" cy="10" r="9.5"></circle>
                            <circle cx="232" cy="10" r="9.5"></circle>
                            <circle cx="269" cy="10" r="9.5"></circle>
                            <circle cx="306" cy="10" r="9.5"></circle>
                            <circle cx="343" cy="10" r="9.5"></circle>
                            <circle cx="380" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="47" r="9.5"></circle>
                            <circle cx="121" cy="47" r="9.5"></circle>
                            <circle cx="158" cy="47" r="9.5"></circle>
                            <circle cx="195" cy="47" r="9.5"></circle>
                            <circle cx="232" cy="47" r="9.5"></circle>
                            <circle cx="269" cy="47" r="9.5"></circle>
                            <circle cx="306" cy="47" r="9.5"></circle>
                            <circle cx="343" cy="47" r="9.5"></circle>
                            <circle cx="380" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="84" r="9.5"></circle>
                            <circle cx="158" cy="84" r="9.5"></circle>
                            <circle cx="195" cy="84" r="9.5"></circle>
                            <circle cx="232" cy="84" r="9.5"></circle>
                            <circle cx="269" cy="84" r="9.5"></circle>
                            <circle cx="306" cy="84" r="9.5"></circle>
                            <circle cx="343" cy="84" r="9.5"></circle>
                            <circle cx="380" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="121" r="9.5"></circle>
                            <circle cx="195" cy="121" r="9.5"></circle>
                            <circle cx="232" cy="121" r="9.5"></circle>
                            <circle cx="269" cy="121" r="9.5"></circle>
                            <circle cx="306" cy="121" r="9.5"></circle>
                            <circle cx="343" cy="121" r="9.5"></circle>
                            <circle cx="380" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="158" r="9.5"></circle>
                            <circle cx="232" cy="158" r="9.5"></circle>
                            <circle cx="269" cy="158" r="9.5"></circle>
                            <circle cx="306" cy="158" r="9.5"></circle>
                            <circle cx="343" cy="158" r="9.5"></circle>
                            <circle cx="380" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="195" r="9.5"></circle>
                            <circle cx="269" cy="195" r="9.5"></circle>
                            <circle cx="306" cy="195" r="9.5"></circle>
                            <circle cx="343" cy="195" r="9.5"></circle>
                            <circle cx="380" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="232" r="9.5"></circle>
                            <circle cx="306" cy="232" r="9.5"></circle>
                            <circle cx="343" cy="232" r="9.5"></circle>
                            <circle cx="380" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="269" r="9.5"></circle>
                            <circle cx="343" cy="269" r="9.5"></circle>
                            <circle cx="380" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="306" r="9.5"></circle>
                            <circle cx="380" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="380" r="9.5"></circle>
                        </g>
                    </svg>
                </div>

                <h3
                    class="relative z-20 -mt-1 text-center text-xl font-bold text-blue-900 dark:text-blue-200 sm:text-3xl"
                >
                    Montant global généré par le parrainage:
                    <span class="text-green-500">{{ total }}
                    {{ $page.props.app.currency }}</span>
                </h3>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid';

defineProps<{
    title?: String;
    total?: Number;
}>();
</script>
