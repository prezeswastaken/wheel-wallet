<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";

const auth = useAuthStore();
</script>

<template>
  <div class="p-10 w-screen min-h-screen font-serif text-white bg-black">
    Layout: default
    <p>Hello {{ auth.user?.name }}!</p>

    <NavBar />
    <slot />
  </div>
</template>

<style scoped></style>
