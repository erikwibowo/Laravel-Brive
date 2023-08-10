<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import AuntheticationIllustration from "@/Components/AuntheticationIllustration.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <GuestLayout>
        <Head :title="lang().label.password_forgot" />

        <template #illustration>
            <AuntheticationIllustration type="login" class="w-72 h-auto" />
        </template>
        <div class="mb-4 text-sm text-slate-600 dark:text-slate-400">
            {{ lang().label.forgot_password }}
        </div>

        <div
            v-if="status"
            class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" :value="lang().label.email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    :placeholder="lang().placeholder.email"
                    :error="form.errors.email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{
                        form.processing
                            ? lang().button.forgot_password + "..."
                            : lang().button.forgot_password
                    }}
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
