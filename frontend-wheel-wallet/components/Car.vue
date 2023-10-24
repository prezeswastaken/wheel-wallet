<script lang="ts" setup>
defineProps({
  imageUrl: {
    type: String,
    default: "https://i.imgflip.com/15vpit.jpg?a471432",
  },
});
</script>

<template>
  <div class="flex relative justify-center items-center group">
    <img :src="imageUrl" alt="nothing here :(" class="w-full rounded-lg" />
    <div
      class="absolute w-full h-full opacity-90 duration-300 group-hover:bg-overlay-background-color"
    ></div>
  </div>
</template>

<style scoped></style>
