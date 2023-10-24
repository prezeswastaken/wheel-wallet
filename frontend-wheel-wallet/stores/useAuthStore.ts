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

type RegistrationData = {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
};

export const useAuthStore = defineStore("auth", () => {
  const user = ref<User | null>(null);

  async function fetchUser() {
    const { data, error } = await useApiFetch("/api/user");
    user.value = data.value as User;
  }

  async function login(credentials: Credentials) {
    await useApiFetch("/sanctum/csrf-cookie");

    const loginResponse = await useApiFetch("/login", {
      method: "POST",
      body: credentials,
    });

    // Navigate to /auth-only ONLY if login were successful
    await fetchUser();
    if (!loginResponse.error.value) {
      navigateTo("/dashboard");
    }
    return loginResponse;
  }

  async function register(registrationData: RegistrationData) {
    await useApiFetch("/sanctum/csrf-cookie");

    const registerResponse = await useApiFetch("/register", {
      method: "POST",
      body: registrationData,
    });

    await fetchUser();
    if (!registerResponse.error.value) {
      navigateTo("/dashboard");
    }
    return registerResponse;
  }

  async function logout() {
    const logoutResponse = await useApiFetch("/logout", {
      method: "POST",
    });
    await fetchUser();
    navigateTo("/login");
    return logoutResponse;
  }

  const isLoggedIn = computed(() => !!user.value);

  return { user, login, isLoggedIn, fetchUser, logout, register };
});
