<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Checkbox from '@/Components/Checkbox.vue';
import { reactive } from 'vue';

const props = defineProps({
    show: Boolean,
    permissions: Object,
})

const emit = defineEmits(["close"]);

const data = reactive({
    multipleSelect: false,
})

const form = useForm({
    name: '',
    guard_name: 'web',
    permissions: [],
})

const create = () => {
    form.post(route('role.store'), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close")
            form.reset()
            data.multipleSelect = false
        },
        onError: () => null,
        onFinish: () => null,
    })
}

const selectAll = (event) => {
    if (event.target.checked === false) {
        form.permissions = []
    } else {
        props.permissions.forEach((permission) => {
            form.permissions.push(permission.id)
        })
    }
}
const select = () => {
    if (props.permissions.length == form.permissions.length) {
        data.multipleSelect = true
    } else {
        data.multipleSelect = false
    }
}

</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')">
            <form class="p-6" @submit.prevent="create">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Add role
                </h2>
                <div class="my-6 space-y-4">
                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                            placeholder="Role Name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel value="Permission" />
                        <InputError class="mt-2" :message="form.errors.permissions" />
                        <div class="flex justify-start items-center space-x-2 mt-2">
                            <Checkbox id="permission-all" v-model:checked="data.multipleSelect" @change="selectAll" />
                            <InputLabel for="permission-all" value="Check all" />
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mt-2">
                            <div class="flex items-center justify-start space-x-2" v-for="(permission, index) in props.permissions" :key="index">
                                <input @change="select"
                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800"
                                    type="checkbox" :id="'permission_' + permission.id" :value="permission.id"
                                    v-model="form.permissions" />
                                    <InputLabel :for="'permission_' + permission.id" :value="permission.name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <SecondaryButton :disabled="form.processing" @click="emit('close')"> Close </SecondaryButton>
                    <PrimaryButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                        @click="create">
                        {{ form.processing ? 'Create...' : 'Create' }}
                    </PrimaryButton>
                </div>
            </form>
        </Modal>
    </section>
</template>
