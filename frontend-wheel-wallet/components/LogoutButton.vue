<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";
import { ArrowRightOnRectangleIcon } from "@heroicons/vue/24/outline";

const auth = useAuthStore();
async function handleLogout() {
  await auth.logout();
}
</script>

<template>
  <button
    v-if="auth.isLoggedIn"
    @click="handleLogout"
    class="duration-300 hover:text-error-color"
  >
    <ArrowRightOnRectangleIcon class="w-9 h-9" />
  </button>
</template>

<style scoped></style>
