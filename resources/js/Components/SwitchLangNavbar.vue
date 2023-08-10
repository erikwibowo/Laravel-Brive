<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
const lang = usePage().props.locale;
</script>

<template>
    <div>
        <span
            v-tooltip="lang == 'id' ? 'Ganti ke EN' : 'Change to ID'"
            class="hover:text-slate-400 hover:bg-slate-900 focus:bg-slate-900 focus:text-slate-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-slate-500 dark:hover:text-slate-400 lg:hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none lg:focus:bg-slate-100 dark:focus:bg-slate-900 lg:focus:text-slate-500 dark:focus:text-slate-400 transition duration-150 ease-in-out"
        >
            <Link
                v-if="lang == 'id'"
                :href="route('setlang', 'en')"
                class="flex items-center space-x-2"
            >
                <span class="w-5 h-5 fill-current"> ID </span>
            </Link>
            <Link
                v-if="lang == 'en'"
                :href="route('setlang', 'id')"
                class="flex items-center space-x-2"
            >
                <span class="w-5 h-5 fill-current"> EN </span>
            </Link>
        </span>
    </div>
</template>
