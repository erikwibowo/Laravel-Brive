<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-slate-900 dark:text-slate-100">
                {{ lang().profile.delete_account }}
            </h2>

            <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                {{ lang().profile.delete_account_caption }}
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">{{
            lang().button.delete_account
        }}</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2
                    class="text-lg font-medium text-slate-900 dark:text-slate-100"
                >
                    {{ lang().profile.delete_account_modal_title }}
                </h2>

                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                    {{ lang().profile.delete_account_modal_caption }}
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        :value="lang().label.password"
                        class="sr-only"
                    />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        @keyup.enter="deleteUser"
                        :placeholder="lang().placeholder.password"
                        :error="form.errors.password"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        {{ lang().button.close }}
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        {{
                            form.processing
                                ? lang().button.delete_account + "..."
                                : lang().button.delete_account
                        }}
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
