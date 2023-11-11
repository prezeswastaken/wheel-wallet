<script setup lang="ts">
definePageMeta({
  middleware: ["guest"],
});
const messageFromApi = ref("Waiting for response from API...");
async function fetchHello() {
  const response = await fetch("https://wheelwallet.cloud/api/hello");
  const data = await response.json();
  messageFromApi.value = data.message;
  console.log(data.message);
}
onMounted(() => {
  fetchHello();
});
</script>
<template>
  <div>
    <div class="flex gap-2 text-3xl text-left">
      Hello from
      <p class="text-blue-500">docker!</p>
    </div>
    <div class="flex gap-2">
      Message from API:
      <p class="text-green-500">{{ messageFromApi }}</p>
    </div>
  </div>
</template>
