<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import SwitchDarkMode from "@/Components/SwitchDarkMode.vue";
import SwitchLangNavbar from "@/Components/SwitchLangNavbar.vue";
</script>

<template>
    <div
        class="min-h-screen flex flex-col-2 sm:justify-center items-center pt-6 sm:pt-0 bg-slate-100 dark:bg-slate-900 text-slate-500 dark:text-slate-300"
    >
        <div
            class="w-full sm:max-w-md lg:max-w-4xl my-4 bg-white dark:bg-slate-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="space-y-6 px-6 py-4 lg:py-16">
                    <div class="flex justify-between items-center">
                        <Link class="flex items-center" href="/">
                            <ApplicationLogo class="w-8 h-8 fill-current" />
                            <p class="text-lg ml-2">
                                {{ $page.props.app.name }}
                            </p>
                        </Link>
                        <div class="flex space-x-2 items-center">
                            <SwitchLangNavbar />
                            <SwitchDarkMode />
                        </div>
                    </div>
                    <slot />
                </div>
                <div
                    class="hidden lg:flex lg:flex-col px-6 py-4 justify-center items-center space-y-2 bg-primary text-white"
                >
                    <slot name="illustration" />
                </div>
            </div>
        </div>
    </div>
</template>
