# PHPiggy

A PHP application for tracking expenses.

## Frontend build (Vite + Tailwind CSS v4)

Stylesheets live in `resources/css/` and are intentionally split so mobile and
desktop styling never mix:

| File | Scope | Loaded by browser when |
|---|---|---|
| `app.css` | shared base, theme tokens, components identical on all screens | always |
| `mobile.css` | transaction **cards**, touch targets, stacked layouts | `(max-width: 767.98px)` |
| `desktop.css` | transactions **table**, hover states, wider spacing | `(min-width: 768px)` |

The header partial (`src/App/views/partials/_header.php`) reads
`public/build/manifest.json` and links each built file with the matching
`media` attribute, so a phone only ever downloads the mobile sheet and a
desktop only ever applies the desktop sheet.

### Commands

```bash
npm install   # install Vite + Tailwind (see .npmrc: legacy-peer-deps)
npm run dev   # vite dev server
npm run build # production build -> public/build/ (hashed css + manifest.json)
npm run watch # rebuild on change
```

`npm run build` also runs `scripts/postbuild.mjs`, which flattens the hashed
CSS files to the root of `public/build/` and re-keys `manifest.json` by source
path for the PHP partial.

### Deploy

1. `composer install --no-dev --optimize-autoloader`
2. `npm ci && npm run build`
3. Point your web server document root at `public/`
4. Commit/deploy `public/build/` alongside the app (it is generated; hash in
   filenames busts caches automatically).
