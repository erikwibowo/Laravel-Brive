<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
import SwitchDarkMode from '@/Components/SwitchDarkMode.vue'
</script>

<template>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="flex justify-between items-center w-full sm:max-w-md text-gray-500 dark:text-gray-300">
            <Link class="flex items-center" href="/">
                <ApplicationLogo class="w-8 h-8 fill-current" />
                <p class="text-lg ml-2">Laravel Brive</p>
            </Link>
            <div>
                <SwitchDarkMode />
            </div>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
