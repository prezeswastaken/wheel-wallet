<script lang="ts" setup>
defineProps({
  link: String,
  text: String,
});
</script>

<template>
  <NuxtLink
    class="capitalize duration-300 hover:text-3xl hover:text-hover-color"
    :to="link"
    >{{ text }}</NuxtLink
  >
</template>

<style scoped></style>
