<script setup>
import {
    HomeIcon,
    UserIcon,
    CheckBadgeIcon
} from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/inertia-vue3";

</script>
<template>
    <div class="text-gray-500 dark:text-gray-300">
        <div class="flex justify-center">
            <div
                class="rounded-full flex items-center justify-center bg-primary dark:bg-primary text-white w-24 h-24 text-4xl uppercase">
                {{ $page.props.auth.user.name.match(/(^\S\S?|\b\S)?/g).join("").match(/(^\S|\S$)?/g).join("") }}
            </div>
        </div>
        <div class="text-center py-3 px-4 border-b border-gray-200 dark:border-gray-600">
            <span class="flex items-center justify-center">
                <p class="truncate text-md">{{ $page.props.auth.user.name }}</p>
                <div>
                    <CheckBadgeIcon class="ml-[2px] w-4 h-4 text-light"
                        v-show="$page.props.auth.user.email_verified_at" />
                </div>
            </span>
            <span class="block text-sm font-medium truncate">{{ $page.props.auth.user.email }}</span>
        </div>
        <ul class="space-y-2 my-4">
            <li class="px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-primary dark:hover:bg-primary hover:text-white"
                :class="{ 'text-white bg-primary dark:bg-primary': route().current('dashboard') }">
                <Link :href="route('dashboard')" class="flex items-center">
                <HomeIcon class="w-6 h-5" />
                <span class="ml-3">Dashboard</span>
                </Link>
            </li>
        </ul>
    </div>
</template>
