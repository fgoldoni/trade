<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="p-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-base font-semibold text-gray-900">Mot de passe oublié ?</h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                        <p>En cas d'oubli de votre mot de passe, nous vous invitons à contacter le service client.</p>
                    </div>
                    <div class="mt-3 text-sm/6">
                        <a :href="`${$page.props.app.service}`" class="font-semibold text-primary-600 hover:text-primary-500">
                            Service clientèle
                            <span aria-hidden="true"> &rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">-->
<!--            Forgot your password? No problem. Just let us know your email-->
<!--            address and we will email you a password reset link that will allow-->
<!--            you to choose a new one.-->
<!--        </div>-->

<!--        <div-->
<!--            v-if="status"-->
<!--            class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"-->
<!--        >-->
<!--            {{ status }}-->
<!--        </div>-->

<!--        <form @submit.prevent="submit">-->
<!--            <div>-->
<!--                <InputLabel for="email" value="Email" />-->

<!--                <TextInput-->
<!--                    id="email"-->
<!--                    type="email"-->
<!--                    class="mt-1 block w-full"-->
<!--                    v-model="form.email"-->
<!--                    required-->
<!--                    autofocus-->
<!--                    autocomplete="username"-->
<!--                />-->

<!--                <InputError class="mt-2" :message="form.errors.email" />-->
<!--            </div>-->

<!--            <div class="mt-4 flex items-center justify-end">-->
<!--                <PrimaryButton-->
<!--                    :class="{ 'opacity-25': form.processing }"-->
<!--                    :disabled="form.processing"-->
<!--                >-->
<!--                    Email Password Reset Link-->
<!--                </PrimaryButton>-->
<!--            </div>-->
<!--        </form>-->
    </GuestLayout>
</template>
