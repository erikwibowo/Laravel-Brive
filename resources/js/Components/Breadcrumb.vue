<script setup>
import { ChevronRightIcon } from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/vue3";
defineProps({
    title: String,
    breadcrumbs: Object,
});
</script>

<template>
    <div
        class="flex items-center justify-between py-4 px-4 sm:px-0 text-slate-500 dark:text-slate-300"
    >
        <p>{{ title }}</p>
        <div class="hidden sm:flex space-x-2 items-center">
            <Link :href="route('dashboard')" v-show="breadcrumbs.length != 0">
                Dashboard
            </Link>
            <div
                v-for="(breadcrumb, index) in breadcrumbs"
                :key="index"
                class="flex items-center space-x-2"
            >
                <ChevronRightIcon class="w-3 h-3" />
                <Link :href="breadcrumb.href">
                    {{ breadcrumb.label }}
                </Link>
            </div>
        </div>
    </div>
</template>
