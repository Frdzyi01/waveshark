import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/landing.css",
        "resources/css/destination.css",
        "resources/css/service.css",
        "resources/css/contact.css",
      ],
      refresh: true,
    }),
  ],
  build: {
    rollupOptions: {
      output: {
        manualChunks(id) {
          if (id.includes("node_modules")) {
            if (id.includes("alpinejs")) {
              return "vendor-alpine";
            }
            if (id.includes("axios")) {
              return "vendor-axios";
            }
            return "vendor";
          }
        },
      },
    },
    chunkSizeWarningLimit: 1000,
  },
});
