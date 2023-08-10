<script setup>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
} from "@headlessui/vue";
import SideBarMenu from "@/Components/SideBarMenu.vue";

const props = defineProps({
    open: Boolean,
});

const emit = defineEmits(["close"]);
</script>
<template>
    <div class="hidden lg:flex">
        <aside
            class="fixed lg:flex flex-col h-screen overflow-hidden w-64 bg-slate-800 dark:bg-slate-900 dark:border-r dark:border-slate-800"
        >
            <div class="flex-1 h-screen overflow-y-auto scrollbar-sidebar px-3">
                <SideBarMenu />
            </div>
        </aside>
    </div>
    <TransitionRoot :show="open">
        <Dialog
            as="div"
            @close="emit('close')"
            class="fixed inset-0 z-10 flex lg:hidden"
        >
            <TransitionChild
                enter="transition ease-in-out duration-200 transform"
                enter-from="-translate-x-full"
                enter-to="translate-x-0"
                leave="transition ease-in-out duration-200 transform"
                leave-from="translate-x-0"
                leave-to="-translate-x-full"
                as="template"
            >
                <aside
                    class="flex flex-col relative z-10 w-64 bg-slate-800 dark:bg-slate-900 dark:border-r dark:border-slate-800"
                >
                    <div class="flex flex-col relative h-screen min-h-screen">
                        <div
                            class="overflow-y-auto flex-1 scrollbar-sidebar px-3"
                        >
                            <SideBarMenu />
                        </div>
                    </div>
                </aside>
            </TransitionChild>
            <TransitionChild
                enter="transition-opacity ease-linear duration-200"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="transition-opacity ease-linear duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
                as="template"
            >
                <DialogOverlay
                    class="fixed inset-0 bg-slate-500 dark:bg-slate-900 opacity-75 lg:hidden"
                ></DialogOverlay>
            </TransitionChild>
        </Dialog>
    </TransitionRoot>
</template>
