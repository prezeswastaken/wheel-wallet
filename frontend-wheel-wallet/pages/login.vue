<script lang="ts" setup>
const form = ref({
  email: "kaspej@o2.pl",
  password: "password",
});

async function handleLogin() {
  const cookieResponse = await useFetch(
    "http://localhost:8000/sanctum/csrf-cookie",
    {
      credentials: "include",
    },
  );

  const token = useCookie("XSRF-TOKEN");

  const loginResponse = await useFetch("http://localhost:8000/login", {
    credentials: "include",
    method: "POST",
    body: form.value,
    headers: {
      "X-XSRF-TOKEN": token.value as string,
    },
  });
  console.log(cookieResponse.status);
}
</script>

<template>
  <div>Page: login</div>
  <form
    @submit.prevent="handleLogin"
    class="flex flex-col gap-5 items-start mt-5"
  >
    <label class="flex flex-col"
      >Email
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="email"
        v-model="form.email"
        placeholder="Enter your email here..."
      />
    </label>
    <label class="flex flex-col"
      >Password
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="password"
        v-model="form.password"
        placeholder="Enter your password here..."
      />
    </label>
    <button class="text-left duration-300 hover:text-orange-300">Login</button>
  </form>
</template>

<style scoped></style>
