<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";
import {
    Bars3CenterLeftIcon,
    CheckBadgeIcon,
    ChevronDownIcon,
    UserIcon,
} from "@heroicons/vue/24/solid";
import SwitchDarkModeNavbar from "@/Components/SwitchDarkModeNavbar.vue";
import SwitchLangNavbar from "@/Components/SwitchLangNavbar.vue";

const emit = defineEmits(["open"]);
</script>

<template>
    <nav
        class="bg-slate-900 border-slate-700 text-slate-300 lg:bg-white dark:bg-slate-900 border-b lg:border-slate-100 dark:border-slate-800 lg:text-slate-500 dark:text-slate-300"
    >
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Hamburger -->
                    <div class="mr-4 shrink-0 flex items-center lg:hidden">
                        <button
                            v-on:click="emit('open')"
                            class="hover:text-slate-400 hover:bg-slate-900 focus:bg-slate-900 focus:text-slate-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-slate-500 dark:hover:text-slate-400 lg:hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none lg:focus:bg-slate-100 dark:focus:bg-slate-900 lg:focus:text-slate-500 dark:focus:text-slate-400 transition duration-150 ease-in-out"
                        >
                            <Bars3CenterLeftIcon class="h-5 w-5" />
                        </button>
                    </div>
                    <!-- Logo -->
                    <div class="flex">
                        <Link
                            :href="route('dashboard')"
                            class="flex items-center space-x-2"
                        >
                            <ApplicationLogo
                                class="hidden md:block h-5 w-auto fill-current"
                            />
                            <p>{{ $page.props.app.name }}</p>
                        </Link>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <SwitchLangNavbar />
                    <SwitchDarkModeNavbar />
                    <div class="">
                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="hover:text-slate-400 hover:bg-slate-900 focus:bg-slate-900 focus:text-slate-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-slate-500 dark:hover:text-slate-400 lg:hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none lg:focus:bg-slate-100 dark:focus:bg-slate-900 lg:focus:text-slate-500 dark:focus:text-slate-400 transition duration-150 ease-in-out sm:hidden"
                                        >
                                            <UserIcon class="h-5 w-5" />
                                        </button>
                                        <button
                                            type="button"
                                            class="hover:text-slate-400 hover:bg-slate-900 focus:bg-slate-900 focus:text-slate-400 items-center justify-center p-2 rounded-md lg:hover:text-slate-500 dark:hover:text-slate-400 lg:hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none lg:focus:bg-slate-100 dark:focus:bg-slate-900 lg:focus:text-slate-500 dark:focus:text-slate-400 transition duration-150 ease-in-out truncate w-fit hidden sm:inline-flex"
                                        >
                                            <span
                                                class="flex justify-between items-center"
                                            >
                                                {{
                                                    $page.props.auth.user.name.split(
                                                        " "
                                                    )[0]
                                                }}
                                                <CheckBadgeIcon
                                                    class="ml-[2px] w-4 h-4 text-white dark:text-white lg:text-primary"
                                                    v-show="
                                                        $page.props.auth.user
                                                            .email_verified_at
                                                    "
                                                />
                                            </span>
                                            <ChevronDownIcon
                                                class="ml-2 h-5 w-5 fill-current"
                                            />
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <div
                                        class="py-3 px-4 border-b border-slate-200 dark:border-slate-600 text-slate-700 dark:text-slate-300"
                                    >
                                        <span
                                            class="flex items-center justify-start text-sm truncate"
                                        >
                                            {{ $page.props.auth.user.name }}
                                            <CheckBadgeIcon
                                                class="ml-[2px] w-4 h-4 dark:text-white text-primary"
                                                v-show="
                                                    $page.props.auth.user
                                                        .email_verified_at
                                                "
                                            />
                                        </span>
                                        <span
                                            class="block text-sm font-medium text-slate-500 truncate dark:text-slate-400"
                                        >
                                            {{
                                                $page.props.auth.user.email
                                            }}</span
                                        >
                                    </div>
                                    <DropdownLink :href="route('profile.edit')">
                                        {{ lang().label.profile }}
                                    </DropdownLink>
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                    >
                                        {{ lang().label.logout }}
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
