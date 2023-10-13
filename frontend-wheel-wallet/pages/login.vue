<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";

const form = ref({
  email: "",
  password: "",
});

const errorMessage = ref("");

const auth = useAuthStore();

async function handleLogin() {
  const { error } = await auth.login(form.value);
  if (error.value != null) {
    console.log("Login error: ", error.value.data.message);
    errorMessage.value = error.value.data.message;
  } else {
    console.log(
      `Logged in user email is ${auth.user?.email}, his id is ${auth.user?.id}, and his name is ${auth.user?.name}.`,
    );
    errorMessage.value = "";
  }
}
</script>

<template>
  <div>Page: login</div>
  <p class="text-error-color">{{ errorMessage }}</p>
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
    <LoginButton />
  </form>
</template>

<style scoped></style>
