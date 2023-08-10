<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Breadcrumb from "@/Components/Breadcrumb.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InfoButton from "@/Components/InfoButton.vue";
import SelectInput from "@/Components/SelectInput.vue";
import { reactive, watch } from "vue";
import DangerButton from "@/Components/DangerButton.vue";
import pkg from "lodash";
import { router } from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import {
    ChevronUpDownIcon,
    PencilIcon,
    TrashIcon,
} from "@heroicons/vue/24/solid";
import Create from "@/Pages/Role/Create.vue";
import Edit from "@/Pages/Role/Edit.vue";
import Delete from "@/Pages/Role/Delete.vue";
import DeleteBulk from "@/Pages/Role/DeleteBulk.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Permission from "@/Pages/Role/Permission.vue";
import { usePage } from "@inertiajs/vue3";

const { _, debounce, pickBy } = pkg;
const props = defineProps({
    title: String,
    filters: Object,
    roles: Object,
    permissions: Object,
    breadcrumbs: Object,
    perPage: Number,
});
const data = reactive({
    params: {
        search: props.filters.search,
        field: props.filters.field,
        order: props.filters.order,
        perPage: props.perPage,
    },
    selectedId: [],
    multipleSelect: false,
    createOpen: false,
    editOpen: false,
    deleteOpen: false,
    deleteBulkOpen: false,
    permissionOpen: false,
    role: null,
    dataSet: usePage().props.app.perpage,
});

const order = (field) => {
    data.params.field = field;
    data.params.order = data.params.order === "asc" ? "desc" : "asc";
};

watch(
    () => _.cloneDeep(data.params),
    debounce(() => {
        let params = pickBy(data.params);
        router.get(route("role.index"), params, {
            replace: true,
            preserveState: true,
            preserveScroll: true,
        });
    }, 150)
);

const selectAll = (event) => {
    if (event.target.checked === false) {
        data.selectedId = [];
    } else {
        props.roles?.data.forEach((role) => {
            data.selectedId.push(role.id);
        });
    }
};
const select = () => {
    if (props.roles?.data.length == data.selectedId.length) {
        data.multipleSelect = true;
    } else {
        data.multipleSelect = false;
    }
};
</script>

<template>
    <Head :title="props.title" />

    <AuthenticatedLayout>
        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" />
        <div class="space-y-4">
            <div class="px-4 sm:px-0">
                <div class="rounded-lg overflow-hidden w-fit">
                    <PrimaryButton
                        v-show="can(['create role'])"
                        class="rounded-none"
                        @click="data.createOpen = true"
                    >
                        {{ lang().button.add }}
                    </PrimaryButton>
                    <Create
                        :show="data.createOpen"
                        @close="data.createOpen = false"
                        :permissions="props.permissions"
                        :title="props.title"
                    />
                    <Edit
                        :show="data.editOpen"
                        @close="data.editOpen = false"
                        :role="data.role"
                        :permissions="props.permissions"
                        :title="props.title"
                    />
                    <Delete
                        :show="data.deleteOpen"
                        @close="data.deleteOpen = false"
                        :role="data.role"
                        :title="props.title"
                    />
                    <DeleteBulk
                        :show="data.deleteBulkOpen"
                        @close="
                            (data.deleteBulkOpen = false),
                                (data.multipleSelect = false),
                                (data.selectedId = [])
                        "
                        :selectedId="data.selectedId"
                        :title="props.title"
                    />
                    <Permission
                        :show="data.permissionOpen"
                        @close="data.permissionOpen = false"
                        :role="data.role"
                        :title="props.title"
                    />
                </div>
            </div>
            <div
                class="relative bg-white dark:bg-slate-800 shadow sm:rounded-lg"
            >
                <div class="flex justify-between p-2">
                    <div class="flex space-x-2">
                        <SelectInput
                            v-model="data.params.perPage"
                            :dataSet="data.dataSet"
                        />
                        <DangerButton
                            @click="data.deleteBulkOpen = true"
                            v-show="
                                data.selectedId.length != 0 &&
                                can(['delete role'])
                            "
                            class="px-3 py-1.5"
                            v-tooltip="lang().tooltip.delete_selected"
                        >
                            <TrashIcon class="w-5 h-5" />
                        </DangerButton>
                    </div>
                    <TextInput
                        v-model="data.params.search"
                        type="text"
                        class="block w-3/6 md:w-2/6 lg:w-1/6 rounded-lg"
                        :placeholder="lang().placeholder.search"
                    />
                </div>
                <div class="overflow-x-auto scrollbar-table">
                    <table class="w-full">
                        <thead
                            class="uppercase text-sm border-t border-slate-200 dark:border-slate-700"
                        >
                            <tr class="dark:bg-slate-900/50 text-left">
                                <th class="px-2 py-4 text-center">
                                    <Checkbox
                                        v-model:checked="data.multipleSelect"
                                        @change="selectAll"
                                    />
                                </th>
                                <th class="px-2 py-4 text-center">#</th>
                                <th
                                    class="px-2 py-4 cursor-pointer"
                                    v-on:click="order('name')"
                                >
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span>{{ lang().label.name }}</span>
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th>
                                <th
                                    class="px-2 py-4 cursor-pointer"
                                    v-on:click="order('email')"
                                >
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span>Guard</span>
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th>
                                <th class="px-2 py-4">
                                    {{ lang().label.permission }}
                                </th>
                                <th
                                    class="px-2 py-4 cursor-pointer"
                                    v-on:click="order('created_at')"
                                >
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span>{{ lang().label.created }}</span>
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th>
                                <th
                                    class="px-2 py-4 cursor-pointer"
                                    v-on:click="order('updated_at')"
                                >
                                    <div
                                        class="flex justify-between items-center"
                                    >
                                        <span>{{ lang().label.updated }}</span>
                                        <ChevronUpDownIcon class="w-4 h-4" />
                                    </div>
                                </th>
                                <th class="px-2 py-4 sr-only">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(role, index) in roles.data"
                                :key="index"
                                class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-200/30 hover:dark:bg-slate-900/20"
                            >
                                <td
                                    class="whitespace-nowrap py-4 px-2 sm:py-3 text-center"
                                >
                                    <input
                                        class="rounded dark:bg-slate-900 border-slate-300 dark:border-slate-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-slate-800 dark:checked:bg-primary dark:checked:border-primary"
                                        type="checkbox"
                                        @change="select"
                                        :value="role.id"
                                        v-model="data.selectedId"
                                    />
                                </td>
                                <td
                                    class="whitespace-nowrap py-4 px-2 sm:py-3 text-center"
                                >
                                    {{ ++index }}
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    {{ role.name }}
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    {{ role.guard_name }}
                                </td>
                                <td
                                    v-tooltip="lang().tooltip.detail"
                                    v-if="
                                        role.permissions.length ==
                                        props.permissions.length
                                    "
                                    @click="
                                        (data.permissionOpen = true),
                                            (data.role = role)
                                    "
                                    class="whitespace-nowrap py-4 px-2 sm:py-3 cursor-pointer text-blue-600 dark:text-blue-400 font-bold underline"
                                >
                                    {{ lang().label.all_permission }}
                                </td>
                                <td
                                    v-tooltip="lang().tooltip.detail"
                                    v-else-if="role.permissions.length != 0"
                                    @click="
                                        (data.permissionOpen = true),
                                            (data.role = role)
                                    "
                                    class="whitespace-nowrap py-4 px-2 sm:py-3 cursor-pointer text-blue-600 dark:text-blue-400 font-bold underline"
                                >
                                    {{ role.permissions.length }}
                                    {{ lang().label.permission }}
                                </td>
                                <td
                                    v-else
                                    class="whitespace-nowrap py-4 px-2 sm:py-3"
                                >
                                    {{ lang().label.no_permission }}
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    {{ role.created_at }}
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    {{ role.updated_at }}
                                </td>
                                <td class="whitespace-nowrap py-4 px-2 sm:py-3">
                                    <div
                                        class="flex justify-center items-center"
                                    >
                                        <div class="rounded-md overflow-hidden">
                                            <InfoButton
                                                v-show="can(['update role'])"
                                                type="button"
                                                @click="
                                                    (data.editOpen = true),
                                                        (data.role = role)
                                                "
                                                class="px-2 py-1.5 rounded-none"
                                                v-tooltip="lang().tooltip.edit"
                                            >
                                                <PencilIcon class="w-4 h-4" />
                                            </InfoButton>
                                            <DangerButton
                                                v-show="can(['delete role'])"
                                                type="button"
                                                @click="
                                                    (data.deleteOpen = true),
                                                        (data.role = role)
                                                "
                                                class="px-2 py-1.5 rounded-none"
                                                v-tooltip="
                                                    lang().tooltip.delete
                                                "
                                            >
                                                <TrashIcon class="w-4 h-4" />
                                            </DangerButton>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="flex justify-between items-center p-2 border-t border-slate-200 dark:border-slate-700"
                >
                    <Pagination :links="props.roles" :filters="data.params" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
