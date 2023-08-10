<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { watchEffect } from "vue";

const props = defineProps({
    show: Boolean,
    title: String,
    selectedId: Object,
});

const emit = defineEmits(["close"]);

const form = useForm({
    id: [],
});

const destory = () => {
    form.post(route("user.destroy-bulk"), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close");
            form.reset();
        },
        onError: () => null,
        onFinish: () => null,
    });
};

watchEffect(() => {
    if (props.show) {
        form.id = props.selectedId;
    }
});
</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')" :maxWidth="'lg'">
            <form class="p-6" @submit.prevent="destory">
                <h2
                    class="text-lg font-medium text-slate-900 dark:text-slate-100"
                >
                    {{ lang().label.delete }} {{ props.title }}
                </h2>
                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                    {{ lang().label.delete_confirm }}
                    {{ props.selectedId?.length }} {{ props.title }}?
                </p>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton
                        :disabled="form.processing"
                        @click="emit('close')"
                    >
                        {{ lang().button.close }}
                    </SecondaryButton>
                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="destory"
                    >
                        {{ form.processing ? "Delete..." : "Delete" }}
                    </DangerButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
