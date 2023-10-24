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
      class="flex absolute flex-col justify-around w-full h-full opacity-0 duration-300 group-hover:opacity-90 bg-overlay-background-color"
    >
      <ShowCarButton />
      <DeleteCarButton />
    </div>
  </div>
</template>

<style scoped></style>
