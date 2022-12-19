<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    title: String,
    filters: Object,
    users: Object,
    breadcrumbs: Object,
});
</script>

<template>

    <Head title="Profile" />

    <AuthenticatedLayout>
        <Breadcrumb :title="title" :breadcrumbs="breadcrumbs" />
        <div class="space-y-4">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
                <div class="flex justify-between p-2">
                    <div></div>
                    <TextInput type="text" class="block w-3/6 md:w-2/6 lg:w-1/6 rounded-lg" placeholder="Search..." />
                </div>
                <div class="overflow-y-auto">
                    <table class="min-w-full">
                        <thead class="uppercase text-sm border-t border-gray-200 dark:border-gray-700">
                            <tr class="dark:bg-gray-900/50 text-left">
                                <th class="px-2 py-4 text-center">#</th>
                                <th class="px-2 py-4">Name</th>
                                <th class="px-2 py-4">Email</th>
                                <th class="px-2 py-4">Created</th>
                                <th class="px-2 py-4">Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index"
                                class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20">
                                <td class="px-2 py-3 text-center">{{ ++index }}</td>
                                <td class="px-2 py-3">{{ user.name }}</td>
                                <td class="px-2 py-3">{{ user.email }}</td>
                                <td class="px-2 py-3">{{ user.created_at }}</td>
                                <td class="px-2 py-3">{{ user.updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700">
                    <div>
                        1-10 of 10
                    </div>
                    <div>
                        <ul class="flex justify-center items-center rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">Prev</li>
                            <li class="px-3 py-2 bg-primary text-white">1</li>
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">2</li>
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">3</li>
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">4</li>
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">5</li>
                            <li class="px-3 py-2 hover:bg-primary hover:text-white">Next</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
