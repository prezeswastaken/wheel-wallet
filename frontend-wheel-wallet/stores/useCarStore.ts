import { defineStore } from "pinia";

import { Car } from "~/types/CarType";

type CarCreateData = {
  model: string;
  status: string;
  owner_id: number;
};

export const useCarStore = defineStore("car", () => {
  const cars = ref<Car[] | null>(null);

  async function fetchCarsByUserID(userID: number) {
    const { data, error } = await useApiFetch(`/api/user/${userID}/cars`);
    cars.value = data.value as Car[];
  }

  async function createCar(carCreateData: CarCreateData) {
    if (carCreateData.status == "") {
      carCreateData.status = "(empty)";
    }
    const response = await useApiFetch("/api/car", {
      method: "post",
      body: carCreateData,
    });
    return response;
  }

  const hasCars = computed(() => {
    if (cars.value && typeof cars.value.length !== "undefined") {
      return cars.value.length > 0;
    } else {
      return false;
    }
  });

  return { fetchCarsByUserID, cars, hasCars, createCar };
});
