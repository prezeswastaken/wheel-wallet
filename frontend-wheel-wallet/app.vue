<script setup lang="ts">
const messageFromApi = ref("Waiting for response from API...");
async function fetchHello() {
  const response = await fetch("//localhost/api/hello");
  const data = await response.json();
  messageFromApi.value = data.message;
  console.log(data.message);
}
onMounted(() => {
  fetchHello();
});
</script>
<template>
  <div class="text-5xl">Hello from docker!</div>
  <div>Message from API: {{ messageFromApi }}</div>
</template>
