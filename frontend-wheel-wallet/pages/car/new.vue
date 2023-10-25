<script lang="ts" setup>
import { useAuthStore } from "~/stores/useAuthStore";
import { useCarStore } from "~/stores/useCarStore";

const authStore = useAuthStore();
const carStore = useCarStore();
const form = ref({
  model: "",
  status: "",
  owner_id: 0,
});
const errorMessage = ref("");
async function handleSubmit() {
  if (authStore.user == null) {
    return;
  }

  form.value.owner_id = authStore.user.id;
  const response = await carStore.createCar(form.value);
  if (response.error.value != null) {
    console.log(response.error.value.data.message);
  } else {
    await navigateTo("/dashboard");
  }
}
</script>

<template>
  <div
    class="flex flex-col justify-center items-center p-10 py-5 w-full h-full"
  >
    <div
      class="flex flex-col gap-10 items-start py-20 px-20 mt-5 w-3/4 text-lg rounded-3xl bg-overlay-background-color"
    >
      <h1 class="self-center text-3xl text-header-color">Add new car</h1>
      <form @submit.prevent="handleSubmit" class="flex flex-col gap-5 w-full">
        <InputField
          :modelValue="form.model"
          @update:modelValue="form.model = $event"
          type="text"
          fieldName="model"
          class=""
          placeholder="Enter model of your car here..."
        />
        <InputField
          :modelValue="form.status"
          @update:modelValue="form.status = $event"
          type="text"
          fieldName="status (optional)"
          class="w-full"
          placeholder="Enter status of your car here (optional)"
        />
        <p class="w-96 text-error-color">{{ errorMessage }}</p>
        <div class="flex justify-between mt-2">
          <p></p>
          <PrimaryButton text="create car" />
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped></style>
