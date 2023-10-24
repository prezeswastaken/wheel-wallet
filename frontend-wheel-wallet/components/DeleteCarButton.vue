<script lang="ts" setup>
import { TrashIcon } from "@heroicons/vue/24/solid";

async function handleDelete() {
  console.log("DIE!");
}
</script>

<template>
  <button
    @click="handleDelete"
    class="flex justify-center duration-300 hover:text-error-color"
  >
    <TrashIcon class="w-9 h-9" />
  </button>
</template>

<style scoped></style>
