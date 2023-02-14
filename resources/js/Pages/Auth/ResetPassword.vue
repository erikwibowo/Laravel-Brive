<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuntheticationIllustration from '@/Components/AuntheticationIllustration.vue';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head :title="lang().label.reset_password" />

        <template #illustration>
            <AuntheticationIllustration type="login" class="w-72 h-auto" />
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" :value="lang().label.email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" :placeholder="lang().placeholder.email" :error="form.errors.email" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" :value="lang().label.password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" :placeholder="lang().placeholder.password" :error="form.errors.password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" :value="lang().label.password_confirmation" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password"
                    :placeholder="lang().placeholder.password_confirmation" :error="form.errors.password_confirmation" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ form.processing ? lang().button.reset_password + '...' : lang().button.reset_password }}
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
