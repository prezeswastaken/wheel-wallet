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
    <InputField
      :modelValue="form.name"
      @update:modelValue="form.name = $event"
      fieldName="name"
    />

    <!-- Email field -->
    <InputField
      :modelValue="form.email"
      @update:modelValue="form.email = $event"
      fieldName="email"
      type="email"
    />

    <!-- Password field -->
    <InputField
      :modelValue="form.password"
      @update:modelValue="form.password = $event"
      fieldName="password"
      type="password"
    />

    <!-- Password confirmation field -->
    <InputField
      :modelValue="form.password_confirmation"
      @update:modelValue="form.password_confirmation = $event"
      fieldName="password confirmation"
      type="password"
      placeholder="Enter your password again..."
    />
    <button class="text-left duration-300 hover:text-orange-300">
      Register
    </button>
  </form>
</template>

<style scoped></style>
