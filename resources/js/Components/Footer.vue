<script setup></script>
<template>
    <footer
        class="sticky top-[100vh] border-t border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-300"
    >
        <div
            class="flex items-center justify-center sm:justify-end max-w-7xl mx-auto p-4 sm:px-6 lg:px-8"
        >
            <p class="text-center">
                <a
                    href="https://brive.erikwibowo.com"
                    target="_blank"
                    class="font-bold"
                    >{{ $page.props.app.name }}</a
                >
                ©️ {{ new Date().getFullYear() }}
                <a
                    href="https://github.com/erikwibowo"
                    target="_blank"
                    class="font-bold text-primary"
                    >Erik Wibowo</a
                >
            </p>
        </div>
    </footer>
</template>
