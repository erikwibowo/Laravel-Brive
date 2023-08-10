<script setup>
import { MoonIcon, SunIcon } from "@heroicons/vue/24/solid";
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
    <div>
        <button
            v-tooltip="lang().tooltip.dark_mode"
            v-on:click="toggleDark()"
            class="hover:text-slate-400 hover:bg-slate-900 focus:bg-slate-900 focus:text-slate-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-slate-500 dark:hover:text-slate-400 lg:hover:bg-slate-100 dark:hover:bg-slate-900 focus:outline-none lg:focus:bg-slate-100 dark:focus:bg-slate-900 lg:focus:text-slate-500 dark:focus:text-slate-400 transition duration-150 ease-in-out"
        >
            <SunIcon v-if="isDark" class="w-5 h-5 fill-current" />
            <MoonIcon v-if="!isDark" class="w-5 h-5 fill-current" />
        </button>
    </div>
</template>
