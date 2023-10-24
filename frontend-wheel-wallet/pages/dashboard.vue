<script lang="ts" setup>
definePageMeta({
  middleware: ["auth"],
});
import { useAuthStore } from "~/stores/useAuthStore";
import { useCarStore } from "~/stores/useCarStore";
import { Car } from "~/types/CarType";

const carStore = useCarStore();
const authStore = useAuthStore();

onMounted(async () => {
  await carStore.fetchCarsByUserID(authStore.user.id);
});
</script>

<template>
  <div
    class="grid grid-cols-2 gap-10 p-10 mt-5 rounded-3xl bg-overlay-background-color"
  >
    <p v-if="!carStore.hasCars" class="self-center">
      You don't have any cars yet! Go change that, right now!
    </p>
    <CarThumbnail
      v-if="carStore.hasCars"
      v-for="car in carStore.cars"
      :car="car"
    />
  </div>
</template>

<style scoped></style>
