import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/frontend.js',
                'resources/js/backend.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            input: {
                frontend: 'resources/js/frontend.js',
                backend: 'resources/js/backend.js',
            },
            output: {
                entryFileNames: assetInfo => {
                    if (assetInfo.name.includes('frontend')) {
                        return 'assets/frontend/[name].js';
                    } else if (assetInfo.name.includes('backend')) {
                        return 'assets/backend/[name].js';
                    } else {
                        return 'assets/[name].js'; // Para archivos comunes
                    }
                },
                chunkFileNames: assetInfo => {
                    if (assetInfo.name.includes('frontend')) {
                        return 'assets/frontend/[name].js';
                    } else if (assetInfo.name.includes('backend')) {
                        return 'assets/backend/[name].js';
                    } else {
                        return 'assets/[name].js'; // Para archivos comunes
                    }
                },
                assetFileNames: assetInfo => {
                    if (assetInfo.name.endsWith('.css')) {
                        if (assetInfo.name.includes('frontend')) {
                            return 'assets/frontend/[name].css';
                        } else if (assetInfo.name.includes('backend')) {
                            return 'assets/backend/[name].css';
                        } else {
                            return 'assets/[name].css'; // Para archivos comunes
                        }
                    }
                    return 'assets/[name].[ext]';
                },
            },
        },
    },
});

// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/app.css',
//                 'resources/js/app.js',
//             ],
//             refresh: true,
//         }),
//     ],
// });
