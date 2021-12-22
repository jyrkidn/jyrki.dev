import { defineConfig } from "laravel-vite";
import tailwind from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig().withPostCSS([tailwind, autoprefixer]);
