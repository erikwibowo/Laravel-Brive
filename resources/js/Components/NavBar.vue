<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { Bars3CenterLeftIcon, ChevronDownIcon, UserIcon } from "@heroicons/vue/24/solid"
import SwitchDarkMode from '@/Components/SwitchDarkMode.vue'

const emit = defineEmits(["open"])

</script>

<template>
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 text-gray-500 dark:text-gray-300">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Hamburger -->
                    <div class="mr-4 shrink-0 flex items-center lg:hidden">
                        <button v-on:click="emit('open')"
                            class="inline-flex items-center justify-center p-2 rounded-md hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <Bars3CenterLeftIcon class="h-6 w-6" />
                        </button>
                    </div>
                    <!-- Logo -->
                    <div class="flex">
                        <Link :href="route('dashboard')" class="flex items-center space-x-2">
                            <ApplicationLogo class="block h-6 w-auto fill-current" />
                            <p>{{ $page.props.app.name }}</p>
                        </Link>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <SwitchDarkMode />
                    <div class="">
                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 sm:hidden">
                                            <UserIcon class="h-4 w-4" />
                                        </button>
                                        <button type="button"
                                            class="hidden sm:inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 truncate w-20">
                                            {{ $page.props.auth.user.name.split(' ')[0] }}
                                            <ChevronDownIcon class="ml-2 -mr-0.5 h-4 w-4 fill-current" />
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <div
                                        class="py-3 px-4 border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300">
                                        <span class="flex items-center justify-start text-sm truncate">
                                            {{ $page.props.auth.user.name }}</span>
                                        <span
                                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">
                                            {{ $page.props.auth.user.email }}</span>
                                    </div>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>