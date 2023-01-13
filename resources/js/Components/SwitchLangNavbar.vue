<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { usePage } from '@inertiajs/inertia-vue3';
const lang = usePage().props.value.locale;
</script>

<template>
    <div>
        <span v-tooltip="lang == 'id' ? 'Ganti ke EN':'Change to ID'" class="hover:text-gray-400 hover:bg-gray-900 focus:bg-gray-900 focus:text-gray-400 inline-flex items-center justify-center p-2 rounded-md lg:hover:text-gray-500 dark:hover:text-gray-400 lg:hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none lg:focus:bg-gray-100 dark:focus:bg-gray-900 lg:focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                
                <Link v-if="lang == 'id'" :href="route('setlang','en')" class="flex items-center space-x-2">
                    <span class="w-5 h-5 fill-current" > ID </span>
                </Link>
                <Link v-if="lang == 'en'" :href="route('setlang','id')" class="flex items-center space-x-2">
                    <span class="w-5 h-5 fill-current" > EN </span>
                </Link>
        </span>
    </div>
</template>
