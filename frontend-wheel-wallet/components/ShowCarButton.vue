<script lang="ts" setup>
import { InformationCircleIcon } from "@heroicons/vue/24/outline";

async function handleDelete() {
  console.log("DIE!");
}
</script>

<template>
  <NuxtLink
    to="/kutacz"
    class="flex justify-center items-center w-auto duration-300 group/show hover:text-header-color"
  >
    <InformationCircleIcon
      class="w-9 h-9 duration-300 group-hover/show:w-16 group-hover/show:h-16"
    />
  </NuxtLink>
</template>

<style scoped></style>
