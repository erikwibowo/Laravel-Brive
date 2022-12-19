<script setup>
import { ref } from 'vue';

defineProps(['modelValue', 'dataSet']);

defineEmits(['update:modelValue']);

const input = ref(null);

</script>

<template>
    <select
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm placeholder:text-gray-400 placeholder:dark:text-gray-400/50"
        :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
        <option v-for="(data, index) in dataSet" :key="index" :value="data.value">{{ data.label }}</option>
    </select>
</template>
