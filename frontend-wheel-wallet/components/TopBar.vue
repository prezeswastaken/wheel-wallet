<script lang="ts" setup></script>

<template>
  <div
    class="flex justify-between p-5 my-5 rounded-3xl shadow shadow-lg bg-overlay-background-color"
  >
    <NuxtLink to="/">
      <img
        class="mr-10 w-32 rounded-full"
        src="https://i.imgur.com/mFntWJ2.jpg"
      />
    </NuxtLink>
    <NavBar />
    <LogoutButton />
  </div>
</template>

<style scoped></style>
