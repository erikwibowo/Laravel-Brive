<script setup>
import { ref } from 'vue';
import NavBarVue from '@/Components/NavBar.vue';
import SideBarVue from "@/Components/SideBar.vue";

const sidebarOpened = ref(false);
const emit = defineEmits(['close', 'open']);
</script>

<template>
    <div class="flex w-full overflow-hidden">
        <SideBarVue :open="sidebarOpened" @close="sidebarOpened = false" />
        <div class="pl-0 lg:pl-64 w-full min-h-screen block bg-gray-100 dark:bg-gray-900">
            <NavBarVue :open="sidebarOpened" @open="sidebarOpened = true" />
            <!-- Page Content -->
            <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-10 text-gray-900 dark:text-gray-100 text-sm">
                <slot />
            </main>
        </div>
    </div>
</template>
