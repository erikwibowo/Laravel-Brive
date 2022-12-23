<script setup>
import { ArrowSmallUpIcon } from '@heroicons/vue/24/solid';
import { reactive } from 'vue';

const data = reactive({
    show: false
})
const toTop = () => {
    window.scrollTo(0, 0)
}
window.addEventListener('scroll', () => {
    let scrollPos = window.scrollY
    if (scrollPos > 0) {
        data.show = true
    } else {
        data.show = false
    }
})
</script>
<template>
    <a v-show="data.show" @click="toTop"
        class="h-14 w-14 bg-primary fixed justify-center items-center z-[9999] bottom-4 right-4 rounded-full p-4 text-white hover:bg-primary cursor-pointer">
        <ArrowSmallUpIcon class="w-6 h-6" />
    </a>
</template>