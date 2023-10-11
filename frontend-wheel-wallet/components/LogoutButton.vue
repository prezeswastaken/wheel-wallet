<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";

const auth = useAuthStore();
async function handleLogout() {
  await auth.logout();
}
</script>

<template>
  <button
    v-if="auth.isLoggedIn"
    @click="handleLogout"
    class="duration-300 hover:text-red-700"
  >
    Logout
  </button>
</template>

<style scoped></style>
