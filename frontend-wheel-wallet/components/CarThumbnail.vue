<script lang="ts" setup>
import { Car } from "~/types/CarType";
defineProps({
  imageUrl: {
    type: String,
    default: "https://i.imgflip.com/15vpit.jpg?a471432",
  },
  car: Object as () => Car,
});
</script>

<template>
  <div class="flex relative justify-center items-center group">
    <img :src="imageUrl" alt="nothing here :(" class="w-full rounded-lg" />
    <div
      class="flex absolute flex-col justify-around w-full h-full opacity-0 duration-300 group-hover:opacity-90 bg-overlay-background-color"
    >
      <p class="text-7xl text-center">
        {{ car?.model }}
      </p>
      <ShowCarButton />
      <p></p>
    </div>
  </div>
</template>

<style scoped></style>
