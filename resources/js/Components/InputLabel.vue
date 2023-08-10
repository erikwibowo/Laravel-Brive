<script setup>
defineProps(["value"]);
</script>

<template>
    <label class="block font-medium text-sm text-slate-700 dark:text-slate-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
