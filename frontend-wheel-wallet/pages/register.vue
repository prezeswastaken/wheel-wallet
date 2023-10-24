<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";
definePageMeta({
  middleware: ["guest"],
});

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
  <div
    class="flex flex-col justify-center items-center p-10 py-5 w-full h-full"
  >
    <div
      class="flex flex-col gap-10 items-start py-20 px-20 mt-5 text-lg rounded-3xl bg-overlay-background-color"
    >
      <h1 class="self-center text-7xl text-header-color">Register</h1>
      <form @submit.prevent="handleRegister" class="flex flex-col gap-5">
        <InputField
          :modelValue="form.name"
          @update:modelValue="form.name = $event"
          fieldName="full name"
          class="w-96"
        />
        <InputField
          :modelValue="form.email"
          @update:modelValue="form.email = $event"
          type="email"
          fieldName="email"
          class="w-96"
        />
        <InputField
          :modelValue="form.password"
          @update:modelValue="form.password = $event"
          type="password"
          fieldName="password"
          class="w-96"
        />
        <InputField
          :modelValue="form.password_confirmation"
          @update:modelValue="form.password_confirmation = $event"
          type="password"
          fieldName="password confirmation"
          class="w-96"
          placeholder="Enter your password again..."
        />
        <p class="w-96 text-error-color">{{ errorMessage }}</p>
        <div class="flex justify-between mt-2">
          <NuxtLink
            class="w-60 duration-300 text-blue-color hover:text-hover-color"
            to="/login"
            >Already have an account?</NuxtLink
          >
          <PrimaryButton text="sign up" />
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped></style>
