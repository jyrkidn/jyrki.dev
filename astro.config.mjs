import { defineConfig } from 'astro/config';
import tailwindcss from '@tailwindcss/vite';
import inspectUrls from "@jsdevtools/rehype-url-inspector";

// https://astro.build/config
export default defineConfig({
  site: 'https://jyrki.dev',
  vite: {
    plugins: [tailwindcss()]
  },
  markdown: {
    shikiConfig: {
      theme: 'catppuccin-latte',
    },
    rehypePlugins: [
      [
        inspectUrls,
        {
          selectors: ["a[href]"],
          inspectEach(url) {
            url.node.properties.target = "_blank";
          }
        }
      ]
      // ...other markdown configuration options
    ],
  },
});
