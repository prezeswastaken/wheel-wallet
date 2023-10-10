import { defineStore } from "pinia";

type User = {
  id: number;
  name: string;
  email: string;
};

type Credentials = {
  email: string;
  password: string;
};

export const useAuthStore = defineStore("auth", () => {
  const user = ref<User | null>(null);

  async function fetchUser() {
    const { data, error } = await useApiFetch("/api/user");
    console.log("Error from useAuthStoreFetchUser", error);
    user.value = data.value as User;
  }

  async function login(credentials: Credentials) {
    await useApiFetch("/sanctum/csrf-cookie");

    const loginResponse = await useApiFetch("/login", {
      method: "POST",
      body: credentials,
    });

    await fetchUser();
    return loginResponse;
  }

  const isLoggedIn = computed(() => !!user.value);

  return { user, login, isLoggedIn, fetchUser };
});
