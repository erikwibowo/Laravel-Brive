<script setup>
import { MoonIcon, SunIcon } from '@heroicons/vue/24/solid'
import { useDark, useToggle } from '@vueuse/core'

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>

<template>
    <div>
        <button v-tooltip="lang().tooltip.dark_mode" v-on:click="toggleDark()" class="p-2 rounded-md text-gray-500 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <SunIcon v-if="isDark" class="w-5 h-5 fill-current" />
                <MoonIcon v-if="!isDark" class="w-5 h-5 fill-current" />
        </button>
    </div>
</template>
