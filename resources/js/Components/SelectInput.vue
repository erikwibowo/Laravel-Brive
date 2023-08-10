<script setup>
import { ref } from "vue";

defineProps(["modelValue", "dataSet"]);

defineEmits(["update:modelValue"]);

const input = ref(null);
</script>

<template>
    <select
        class="border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm placeholder:text-slate-400 placeholder:dark:text-slate-400/50"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    >
        <option
            v-for="(data, index) in dataSet"
            :key="index"
            :value="data.value"
        >
            {{ data.label }}
        </option>
    </select>
</template>
