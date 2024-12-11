<template>
    <div class="border-l-4 border-rose-400 bg-rose-100 p-4 mt-8">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-base font-semibold text-gray-900">Compte de retrait manquant.</h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>Pour effectuer un retrait, nous vous invitons à créer au préalable un compte de retrait Orange ou MTN.</p>
            </div>
            <div class="mt-5">
                <Link :href="route('recipients.index')" class="inline-flex items-center rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-500">Créez votre compte de retrait</Link>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
</script>
