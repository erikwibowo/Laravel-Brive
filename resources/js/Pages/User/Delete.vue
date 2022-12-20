<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    show: Boolean,
    user: Object,
})

const emit = defineEmits(["close"]);

const form = useForm({});

const destory = () => {
    form.delete(route('user.destroy', props.user?.id), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close")
            form.reset()
        },
        onError: () => null,
        onFinish: () => null,
    })
}

</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')" :maxWidth="'lg'">
            <form class="p-6" @submit.prevent="destory">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Delete user
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Are you sure to delete user <b>{{ props.user?.name }}</b>?
                </p>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton :disabled="form.processing" @click="emit('close')"> Close </SecondaryButton>
                    <DangerButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        @click="destory">
                        {{ form.processing ? 'Delete...' : 'Delete' }}
                    </DangerButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
