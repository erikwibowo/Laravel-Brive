<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import SwitchDarkMode from "@/Components/SwitchDarkMode.vue";
import { Head, Link } from "@inertiajs/vue3";
import SwitchLangNavbar from "@/Components/SwitchLangNavbar.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head :title="lang().label.welcome" />
    <div
        class="relative flex justify-center min-h-screen bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100 items-center sm:pt-0"
    >
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex items-center pt-8 px-4 sm:px-0 justify-between sm:pt-0"
            >
                <div class="flex items-center">
                    <ApplicationLogo
                        class="h-10 w-auto text-primary fill-current sm:h-16"
                    />
                    <p class="text-3xl sm:text-5xl ml-4 text-primary">
                        {{ $page.props.app.name }}
                    </p>
                </div>
                <div class="flex space-x-2 items-center">
                    <SwitchLangNavbar />
                    <SwitchDarkMode />
                </div>
            </div>

            <div
                class="mt-4 bg-white dark:bg-slate-800 overflow-hidden shadow sm:rounded-lg"
            >
                <div class="grid grid-cols-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-slate-500"
                            >
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                ></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a
                                    href="https://github.com/erikwibowo/Laravel-Brive/blob/master/README.md"
                                    class="underline text-slate-900 dark:text-white"
                                    >{{ lang().label.documentation }}</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div
                                class="mt-2 text-slate-600 dark:text-slate-400 text-sm"
                            >
                                {{ lang().label.documentation_detail }}
                            </div>
                            <div
                                v-if="canLogin"
                                class="flex items-center justify-start space-x-4 mt-4"
                            >
                                <Link
                                    v-if="$page.props.auth.user"
                                    :href="route('dashboard')"
                                    class="text-lg text-slate-700 dark:text-slate-500 underline"
                                    >Dashboard</Link
                                >

                                <template v-else>
                                    <Link
                                        :href="route('login')"
                                        class="text-lg text-slate-700 dark:text-slate-500 underline"
                                        >{{ lang().label.login }}</Link
                                    >

                                    <Link
                                        v-if="canRegister"
                                        :href="route('register')"
                                        class="ml-4 text-lg text-slate-700 dark:text-slate-500 underline"
                                        >{{ lang().label.register }}</Link
                                    >
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:flex justify-between mt-4 text-sm text-slate-500">
                <div
                    class="flex mx-4 sm:mx-0 flex-row justify-center text-center"
                >
                    <p>
                        <a
                            href="https://brive.erikwibowo.com"
                            target="_blank"
                            >{{ $page.props.app.name }}</a
                        >
                        ©️
                        {{ new Date().getFullYear() }}
                        <a
                            href="https://github.com/erikwibowo"
                            target="_blank"
                            class="text-primary"
                            >Erik Wibowo</a
                        >
                    </p>
                </div>
                <div class="flex mx-4 sm:mx-0 justify-center text-center">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>
