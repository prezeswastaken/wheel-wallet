<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";

const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const errorMessage = ref("");

const auth = useAuthStore();

async function handleRegister() {
  const { error } = await auth.register(form.value);
  if (error.value != null) {
    console.log("Error after registration: ", error);
    errorMessage.value = error.value.data.message;
  } else {
    console.log(
      `Logged in user email after registration is ${auth.user?.email}, his id is ${auth.user?.id}, and his name is ${auth.user?.name}.`,
    );

    errorMessage.value = "";
  }
}
</script>

<template>
  <div>Page: register</div>
  <p class="text-error-color">{{ errorMessage }}</p>
  <form
    @submit.prevent="handleRegister"
    class="flex flex-col gap-5 items-start mt-5"
  >
    <!-- Name field -->
    <label class="flex flex-col"
      >Name
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="text"
        v-model="form.name"
        placeholder="Enter your name here..."
      />
    </label>

    <!-- Email field -->
    <label class="flex flex-col"
      >Email
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="email"
        v-model="form.email"
        placeholder="Enter your email here..."
      />
    </label>

    <!-- Password field -->
    <label class="flex flex-col"
      >Password
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="password"
        v-model="form.password"
        placeholder="Enter your password here..."
      />
    </label>

    <!-- Password confirmation field -->
    <label class="flex flex-col"
      >Password confirmation
      <input
        class="py-2 px-5 w-72 bg-black rounded-lg border border-orange-500"
        type="password"
        v-model="form.password_confirmation"
        placeholder="Enter your password again..."
      />
    </label>
    <button class="text-left duration-300 hover:text-orange-300">
      Register
    </button>
  </form>
</template>

<style scoped></style>
