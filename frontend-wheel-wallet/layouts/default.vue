<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";

const auth = useAuthStore();
</script>

<template>
  <head>
    <title>Wheel Wallet - keep your car budget rolling</title>
  </head>
  <div
    class="p-10 w-screen min-h-screen font-myMono bg-background-color text-text-color"
  >
    <TopBar />
    Layout: default
    <p class="text-3xl text-header-color" v-if="auth.user">
      Hello {{ auth.user?.name }}!
    </p>

    <slot />
  </div>
</template>

<style scoped></style>
