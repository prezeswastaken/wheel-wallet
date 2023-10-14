<script lang="ts" setup>
import { computed } from "vue";

const props = defineProps({
  modelValue: {
    type: String,
    required: false,
    default: "",
  },
  type: {
    type: String,
    required: false,
    default: "text",
  },
  fieldName: {
    type: String,
    required: true,
  },
  placeholder: {
    type: String,
    required: false,
    default: "",
  },
});
const defaultPlaceholder = computed(
  () => `Enter your ${props.fieldName} here...`,
);

defineEmits(["update:modelValue"]);
</script>

<template>
  <label class="flex flex-col gap-3 capitalize"
    >{{ fieldName }}
    <input
      class="py-2 px-5 rounded-lg border border-text-color text-text-color bg-overlay-background-color"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      :type="type"
      :placeholder="placeholder == '' ? defaultPlaceholder : placeholder"
    />
  </label>
</template>

<style scoped></style>
