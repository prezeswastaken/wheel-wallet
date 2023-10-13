<script lang="ts" setup>
const normalImageLink = "https://i.imgur.com/mFntWJ2.jpg";
const hoverImageLink = "https://i.imgur.com/HuwUKl1.jpg";

const imageLink = ref(normalImageLink);

const handleMouseOver = () => {
  imageLink.value = hoverImageLink;
};

const handleMouseLeave = () => {
  imageLink.value = normalImageLink;
};
</script>

<template>
  <NuxtLink to="/">
    <img
      class="mr-10 w-32 rounded-full"
      :src="imageLink"
      @mouseover="handleMouseOver"
      @mouseleave="handleMouseLeave"
    />
  </NuxtLink>
</template>

<style scoped></style>
