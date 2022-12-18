<template>
    <transition name="slide-fade">
        <div v-if="flash.success && isVisible" class="absolute top-4 right-4 w-8/12 md:w-6/12 lg:w-3/12 z-[100]">
            <div class="flex p-4 justify-between items-center bg-success dark:bg-success-dark rounded-lg">
                <div>
                    <CheckCircleIcon class="h-8 w-8 text-light" fill="currentColor" />
                </div>
                <div class="mx-3 text-sm font-medium text-light" v-html="flash.success">
                </div>
                <button @click="toggle" type="button" class="ml-auto bg-light/20 text-light rounded-lg focus:ring-2 focus:ring-light/50 p-1.5 hover:bg-light/30 h-8 w-8">
                    <span class="sr-only">Close</span>
                    <XMarkIcon class="h-5 w-5" fill="currentColor" />
                </button>
            </div>
        </div>
    </transition>
    <transition name="slide-fade">
        <div v-if="flash.error && isErrorVisible" class="absolute top-4 right-4 w-8/12 md:w-6/12 lg:w-3/12 z-[100]">
            <div class="flex p-4 justify-between items-center bg-error dark:bg-error-dark rounded-lg">
                <div>
                    <ExclaimationCircleIcon class="h-8 w-8 text-light" fill="currentColor" />
                </div>
                <div class="mx-3 text-sm font-medium text-light" v-html="flash.error">
                </div>
                <button @click="toggle" type="button" class="ml-auto bg-light/20 text-light rounded-lg focus:ring-2 focus:ring-light/50 p-1.5 hover:bg-light/30 h-8 w-8">
                    <span class="sr-only">Close</span>
                    <XMarkIcon class="h-5 w-5" fill="currentColor" />
                </button>
            </div>
        </div>
    </transition>
</template>

<script>
import { CheckCircleIcon, ExclaimationCircleIcon, XMarkIcon } from '@heroicons/vue/24/solid';

export default {
    components: {
        CheckCircleIcon,
        ExclaimationCircleIcon,
        XMarkIcon
    },
    props: {
        flash: Object,
    },
    data() {
        return {
            isVisible: false,
            isErrorVisible: false,
            timeout: null,
        }
    },
    methods: {
        toggle() {
            this.isVisible = false;
            this.isErrorVisible = false;
        },
    },
    watch: {
        flash: {
            deep: true,
            handler(newVal) {
                this.isVisible = true;
                this.isErrorVisible = true;

                if (this.timeout) {
                    clearTimeout(this.timeout);
                }

                this.timeout = setTimeout(() => {
                    this.isVisible = false;
                }, 3000);
            },
        },
    },
}
</script>

<style>
    /*
    Enter and leave animations can use different
    durations and timing functions.
    */
    .slide-fade-enter-active {
    transition: all 0.3s ease-out;
    }

    .slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
    transform: translateX(10px);
    opacity: 0;
    }
</style>