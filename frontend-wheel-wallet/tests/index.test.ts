import { describe, expect, test } from "vitest";
import { setup, $fetch } from "@nuxt/test-utils";

describe("Index Page test", async () => {
  await setup({

  })

  test("Rendering correctly", async () => {
    const html = await $fetch("/")

    expect(html).toContain("Hello from")
    expect(html).toContain("docker!")
  })
})