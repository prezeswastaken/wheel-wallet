<script lang="ts" setup>
defineProps({
  link: String,
  text: String,
});
</script>

<template>
  <NuxtLink class="capitalize duration-300 hover:text-orange-400" :to="link">{{
    text
  }}</NuxtLink>
</template>

<style scoped></style>
