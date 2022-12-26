<script setup>
import { MoonIcon, SunIcon } from '@heroicons/vue/24/solid'
import { useDark, useToggle } from '@vueuse/core'

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>

<template>
    <div>
        <button v-tooltip="lang().tooltip.dark_mode" v-on:click="toggleDark()" class="hover:text-gray-400 hover:bg-gray-900 focus:bg-gray-900 focus:text-gray-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-gray-500 dark:hover:text-gray-400 lg:hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none lg:focus:bg-gray-100 dark:focus:bg-gray-900 lg:focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <SunIcon v-if="isDark" class="w-5 h-5 fill-current" />
                <MoonIcon v-if="!isDark" class="w-5 h-5 fill-current" />
        </button>
    </div>
</template>
