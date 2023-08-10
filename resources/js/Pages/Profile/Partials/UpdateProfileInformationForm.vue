<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
const updateProfile = () => {
    form.patch(route("profile.update"), {
        preserveScroll: true,
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-slate-900 dark:text-slate-100">
                {{ lang().profile.profile_information }}
            </h2>

            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                {{ lang().profile.update_profile }}
            </p>
        </header>

        <form @submit.prevent="updateProfile" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" :value="lang().label.name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    :placeholder="lang().placeholder.name"
                    :error="form.errors.name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" :value="lang().label.email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="email"
                    :placeholder="lang().placeholder.email"
                    :error="form.errors.email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div
                v-if="props.mustVerifyEmail && user.email_verified_at === null"
            >
                <p class="text-sm mt-2 text-slate-800 dark:text-slate-200">
                    {{ lang().profile.unverified_email }}
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-slate-800"
                    >
                        {{ lang().profile.resend_email_verification }}
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"
                >
                    {{ lang().profile.sent_verification_email }}
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{
                        form.processing
                            ? lang().button.save + "..."
                            : lang().button.save
                    }}
                </PrimaryButton>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-slate-600 dark:text-slate-400"
                    >
                        {{ lang().profile.saved }}
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
