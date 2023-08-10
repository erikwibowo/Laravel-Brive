<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    show: Boolean,
    title: String,
    role: Object,
});

const emit = defineEmits(["close"]);
</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')" :maxWidth="'2xl'">
            <div class="p-6 text-slate-900 dark:text-slate-100">
                <h2 class="text-lg font-medium">
                    {{ lang().label.permission }}
                </h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                    {{ lang().label.all_permission }} {{ lang().label.role }}
                    <b>{{ props.role?.name }}</b>
                </p>
                <div class="my-6 grid grid-cols-2 sm:grid-cols-3">
                    <div
                        v-for="(permission, index) in props.role?.permissions"
                        :key="index"
                        class="flex justify-between w-full px-4 py-2"
                    >
                        {{ ++index + ". " + permission.name }}
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="emit('close')">
                        {{ lang().button.close }}
                    </SecondaryButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
