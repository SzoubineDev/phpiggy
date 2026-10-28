// Normalizes Vite's CSS-only manifest for the PHP header partial:
// - moves hashed files from build/assets/ to build/ root
// - re-keys manifest.json by source path (resources/css/*.css)
import { readFileSync, writeFileSync, renameSync, rmSync, existsSync } from 'node:fs';
import { join, basename } from 'node:path';

const buildDir = 'public/build';
const viteManifest = join(buildDir, '.vite', 'manifest.json');
if (!existsSync(viteManifest)) {
    console.error('postbuild: manifest not found at', viteManifest);
    process.exit(1);
}
const m = JSON.parse(readFileSync(viteManifest, 'utf8'));
const out = {};
for (const [key, val] of Object.entries(m)) {
    const base = basename(val.file);
    const from = join(buildDir, val.file);
    const to = join(buildDir, base);
    if (existsSync(from) && from !== to) renameSync(from, to);
    out[key] = { ...val, file: base };
}
writeFileSync(join(buildDir, 'manifest.json'), JSON.stringify(out, null, 2));
rmSync(join(buildDir, 'assets'), { recursive: true, force: true });
rmSync(join(buildDir, '.vite'), { recursive: true, force: true });
console.log('postbuild: public/build/manifest.json ready ->', Object.keys(out).join(', '));
