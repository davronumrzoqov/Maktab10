import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true, // shu portni ishlatadi, o'zgartirmaydi
        hmr: {
            host: '127.0.0.1',
        },
    },
    build: {
        outDir: 'public/build', // manifest shu joyda bo'ladi
        manifest: true,
        emptyOutDir: true,
    },
});
