<script setup>
import Breadcrumb from '@/Components/Breadcrumb.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ChevronRightIcon, KeyIcon, ShieldCheckIcon, UserIcon } from '@heroicons/vue/24/solid';
import { Head, Link } from '@inertiajs/inertia-vue3';

</script>

<template>

    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <Breadcrumb :title="'Dashboard'" :breadcrumbs="[]" />
        <div class="space-y-4">
            <div
                class="text-white dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 sm:gap-4 overflow-hidden shadow-sm">
                <div>
                    <div
                        class="rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between bg-blue-600/70 dark:bg-blue-600/60 items-center overflow-hidden">
                        <div>
                            <UserIcon class="w-12 h-12" />
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-4xl mr-2 font-bold mb-2">3</p>
                            <p class="text-md md:text-xl uppercase text-right">Users</p>
                        </div>
                    </div>
                    <div
                        class="bg-blue-600 dark:bg-blue-600/50 rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-blue-600/90 dark:hover:bg-blue-600/40">
                        <Link :href="route('user.index')" class="flex justify-between items-center">
                        <p>More</p>
                        <ChevronRightIcon class="w-5 h-5" />
                        </Link>
                    </div>
                </div>
                <div>
                    <div
                        class="rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between bg-green-600/70 dark:bg-green-600/60 items-center overflow-hidden">
                        <div>
                            <KeyIcon class="w-12 h-12" />
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-4xl mr-2 font-bold mb-2">3</p>
                            <p class="text-md md:text-xl uppercase text-right">Roles</p>
                        </div>
                    </div>
                    <div
                        class="bg-green-600 dark:bg-green-600/50 rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-green-600/90 dark:hover:bg-green-600/40">
                        <Link :href="route('role.index')" class="flex justify-between items-center">
                        <p>More</p>
                        <ChevronRightIcon class="w-5 h-5" />
                        </Link>
                    </div>
                </div>
                <div>
                    <div
                        class="rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between bg-amber-600/70 dark:bg-amber-600/60 items-center overflow-hidden">
                        <div>
                            <ShieldCheckIcon class="w-12 h-12" />
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-4xl mr-2 font-bold mb-2">12</p>
                            <p class="text-md md:text-xl uppercase text-right">Permissions</p>
                        </div>
                    </div>
                    <div
                        class="bg-amber-600 dark:bg-amber-600/50 rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-amber-600/90 dark:hover:bg-amber-600/40">
                        <Link :href="route('permission.index')" class="flex justify-between items-center">
                        <p>More</p>
                        <ChevronRightIcon class="w-5 h-5" />
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
