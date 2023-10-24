<script lang="ts" setup>
definePageMeta({
  middleware: ["auth"],
});
import { Car } from "~/types/CarType";
const car1: Car = {
  id: 1,
  model: "Model S",
  owner_id: 123,
  coowner_id: 456,
  status: "Active",
  code: "XYZ",
  created_at: "2023-10-24",
  updated_at: "2023-10-24",
};
onMounted(() => {
  console.log(car1);
});
</script>

<template>
  <div
    class="grid grid-cols-2 gap-10 p-10 mt-5 rounded-3xl bg-overlay-background-color"
  >
    <CarThumbnail :car="car1" />
  </div>
</template>

<style scoped></style>
