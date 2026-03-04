import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from 'fs';
import path from 'path';

function copyTinyMCEAssets() {
    return {
        name: 'copy-tinymce-assets',
        writeBundle() {
            const targets = [
                { src: 'node_modules/tinymce/skins', dest: 'public/build/tinymce/skins' },
                { src: 'node_modules/tinymce/models', dest: 'public/build/tinymce/models' },
                { src: 'node_modules/tinymce/themes', dest: 'public/build/tinymce/themes' },
                { src: 'node_modules/tinymce/icons', dest: 'public/build/tinymce/icons' },
            ];
            targets.forEach(({ src, dest }) => {
                if (fs.existsSync(src)) {
                    fs.cpSync(src, dest, { recursive: true });
                }
            });
        },
    };
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin.js'],
            refresh: true,
        }),
        tailwindcss(),
        copyTinyMCEAssets(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
