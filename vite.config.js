import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/normalize.min.css',
                'resources/css/index.css',
                'resources/css/cart.css',
                'resources/css/signin.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
