<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Link
        class="block w-full px-4 py-2 text-left text-sm leading-5 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none focus:bg-slate-100 dark:focus:bg-slate-800 transition duration-150 ease-in-out"
    >
        <slot />
    </Link>
</template>
