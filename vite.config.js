import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

// Vite + Tailwind v4 build for PHPiggy.
// Input:  resources/css/app.css     -> shared base (all breakpoints)
//         resources/css/mobile.css  -> MOBILE ONLY  (max-width: 767.98px)
//         resources/css/desktop.css -> DESKTOP ONLY (min-width: 768px)
// Output: public/build/ (hashed CSS files + manifest.json consumed by _header.php)
export default defineConfig({
    plugins: [tailwindcss()],
    root: __dirname,
    base: '/build/',
    // The PHP app serves from public/; disable Vite's public-dir copying so
    // outDir (public/build) doesn't collide with it during builds.
    publicDir: false,
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                app: 'resources/css/app.css',
                mobile: 'resources/css/mobile.css',
                desktop: 'resources/css/desktop.css',
            },
        },
    },
});
