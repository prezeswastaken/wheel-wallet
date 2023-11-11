import type { UseFetchOptions } from "nuxt/app";

export function useApiFetch<T>(path: string, options: UseFetchOptions<T> = {}) {
  let headers: any = {
    referer: "https://coral-app-zmqgc.ondigitalocean.app",
  };
  const token = useCookie("XSRF-TOKEN");

  if (token.value) {
    headers["X-XSRF-TOKEN"] = token.value as string;
  }

  if (process.server) {
    headers = {
      ...headers,
      ...useRequestHeaders(["cookie"]),
    };
  }
  return useFetch(`https://wheelwallet.cloud${path}`, {
    credentials: "include",
    watch: false,
    ...options,
    headers: {
      ...headers,
      ...options?.headers,
    },
  });
}
