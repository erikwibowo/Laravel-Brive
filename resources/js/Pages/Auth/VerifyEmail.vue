<script setup>
import { computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuntheticationIllustration from "@/Components/AuntheticationIllustration.vue";

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route("verification.send"));
};

const verificationLinkSent = computed(
    () => props.status === "verification-link-sent"
);
</script>

<template>
    <GuestLayout>
        <Head :title="lang().label.email_verification" />

        <template #illustration>
            <AuntheticationIllustration type="login" class="w-72 h-auto" />
        </template>
        <div class="mb-4 text-sm text-slate-600 dark:text-slate-400">
            {{ lang().label.verify_email }}
        </div>

        <div
            class="mb-4 font-medium text-sm text-green-600 dark:text-green-400"
            v-if="verificationLinkSent"
        >
            {{ lang().label.verify_email_notification }}
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{
                        form.processing
                            ? lang().button.resend_email + "..."
                            : lang().button.resend_email
                    }}
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-slate-800"
                >
                    Log Out</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
