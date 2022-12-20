<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    show: Boolean,
    roles: Object,
})

const emit = defineEmits(["close"]);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'superadmin',
})

const create = () => {
    form.post(route('user.store'), {
        preserveScroll: true,
        onSuccess: () => {
            emit("close")
            form.reset()
        },
        onError: () => null,
        onFinish: () => null,
    })
}

const roles = props.roles.map(role => ({ label: role.name, value: role.name }))

</script>

<template>
    <section class="space-y-6">
        <Modal :show="props.show" @close="emit('close')">
            <form class="p-6" @submit.prevent="create">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Add User
                </h2>
                <div class="my-6 space-y-4">
                    <div>
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                            placeholder="Your Name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                            placeholder="email@email.com" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                    <div>
                        <InputLabel for="password" value="Password" />
                        <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                            placeholder="********" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                    <div>
                        <InputLabel for="password_confirmation" value="Confirm Password" />
                        <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                            v-model="form.password_confirmation" placeholder="********" />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>
                    <div>
                        <InputLabel for="role" value="Role" />
                        <SelectInput id="role" class="mt-1 block w-full" v-model="form.role" required :dataSet="roles">
                        </SelectInput>
                        <InputError class="mt-2" :message="form.errors.role" />
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
