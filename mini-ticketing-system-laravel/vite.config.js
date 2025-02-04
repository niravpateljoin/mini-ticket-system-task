import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        // vue({ 
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
    ],
    // server: {
    //     host: '0.0.0.0',
    //     port: 8000,
    //     // hmr: {
    //     //     host: '192.168.X.X', // Change this value for your local network ip address
    //     //     port: 8000, // Or your app's standard port
    //     // },
    // },
    // server: {
    //     hmr: {
    //         host: 'localhost',
    //     },
    // },
    // resolve: { 
    //     alias: {
    //         vue: 'vue/dist/vue.esm-bundler.js',
    //         '@': path.resolve(__dirname, 'resources/js'),
    //     },
    // },
});
