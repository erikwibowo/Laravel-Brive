<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { reactive, watch } from 'vue';
import DangerButton from '@/Components/DangerButton.vue';
import { _, pickBy, debounce } from "lodash";
import { Inertia } from '@inertiajs/inertia';
import Pagination from '@/Components/Pagination.vue';
import { PencilIcon, TrashIcon } from '@heroicons/vue/24/solid';

const props = defineProps({
    title: String,
    filters: Object,
    users: Object,
    breadcrumbs: Object,
    perPage: String
});
const data = reactive({
    params: {
        search: props.filters.search,
        field: props.filters.field,
        order: props.filters.order,
        perPage: parseInt(props.perPage),
    },
    dataSet: [
        { label: '10', 'value': 10 },
        { label: '20', 'value': 20 },
        { label: '50', 'value': 50 },
        { label: '100', 'value': 100 },
    ]
});

const order = (field) => {
    data.params.field = field;
    data.params.order = data.params.order === "asc" ? "desc" : "asc";
}

watch(() => _.cloneDeep(data.params), debounce(() => {
    let params = pickBy(data.params);
    Inertia.get(route("user.index"), params, {
        replace: true,
        preserveState: true,
    })
}, 150)
)
</script>

<template>

    <Head title="Profile" />

    <AuthenticatedLayout>
        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" />
        <div class="space-y-4">
            <div class="px-4 sm:px-0">
                <div class="rounded-lg overflow-hidden w-fit">
                    <PrimaryButton class="rounded-none">
                        Add
                    </PrimaryButton>
                </div>
            </div>
            <div class="relative bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex justify-between p-2">
                    <div>
                        <SelectInput v-model="data.params.perPage" :dataSet="data.dataSet" />
                    </div>
                    <TextInput v-model="data.params.search" type="text" class="block w-3/6 md:w-2/6 lg:w-1/6 rounded-lg" placeholder="Search..." />
                </div>
                <div class="overflow-x-auto scrollbar-table">
                    <table class="w-full">
                        <thead class="uppercase text-sm border-t border-gray-200 dark:border-gray-700">
                            <tr class="dark:bg-gray-900/50 text-left">
                                <th class="px-2 py-4 text-center">#</th>
                                <th class="px-2 py-4">Name</th>
                                <th class="px-2 py-4">Email</th>
                                <th class="px-2 py-4">Created</th>
                                <th class="px-2 py-4">Updated</th>
                                <th class="px-2 py-4 sr-only">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index"
                                class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20">
                                <td class="whitespace-nowrap px-2 py-3 text-center">{{ ++index }}</td>
                                <td class="whitespace-nowrap px-2 py-3">{{ user.name }}</td>
                                <td class="whitespace-nowrap px-2 py-3">{{ user.email }}</td>
                                <td class="whitespace-nowrap px-2 py-3">{{ user.created_at }}</td>
                                <td class="whitespace-nowrap px-2 py-3">{{ user.updated_at }}</td>
                                <td class="whitespace-nowrap">
                                    <div class="flex justify-center items-center">
                                        <div class="rounded-md overflow-hidden">
                                            <PrimaryButton class="px-2 py-1.5 rounded-none" v-tooltip="'Edit'">
                                                <PencilIcon class="w-4 h-4" />
                                            </PrimaryButton>
                                            <DangerButton class="px-2 py-1.5 rounded-none" v-tooltip="'Delete'">
                                                <TrashIcon class="w-4 h-4" />
                                            </DangerButton>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700">
                    <Pagination :links="props.users" :filters="data.params" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
