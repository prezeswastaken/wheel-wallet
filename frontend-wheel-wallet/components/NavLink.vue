<script lang="ts" setup>
const props = defineProps({
  link: String,
  text: String,
});
</script>

<template>
  <NuxtLink
    class="capitalize duration-300 hover:text-3xl hover:text-hover-color"
    :to="link"
    >{{ text }}
  </NuxtLink>
</template>

<style scoped>
.router-link-active {
  @apply text-header-color font-bold underline-offset-8 underline;
}
</style>
