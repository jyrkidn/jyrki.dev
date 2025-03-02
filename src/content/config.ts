import { defineCollection, z } from 'astro:content';

const postsCollection = defineCollection({
    type: 'content',
    schema: () => z.object({
        title: z.string(),
        tags: z.array(z.string()),
        date: z.coerce.date(),
        excerpt: z.string(),
    }),
});

export const collections = {
    blog: postsCollection,
};
