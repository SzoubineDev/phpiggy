<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="theme-color" content="#312e81" />
    <title>PHPiggy</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <?php
    /* Vite build assets (npm run build -> public/build/manifest.json).
       Three sheets are loaded separately so mobile & desktop styling never mix:
       - app.css      : shared base (all breakpoints)
       - mobile.css   : only under (max-width: 767.98px)
       - desktop.css  : only under (min-width: 768px) */
    $manifestPath = __DIR__ . '/../../../../public/build/manifest.json';
    $manifest     = is_readable($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
    $assetUrl = function (string $key) use ($manifest): string {
        return isset($manifest[$key]['file']) ? '/build/' . $manifest[$key]['file'] : '';
    };
    ?>
    <link rel="stylesheet" href="<?= $assetUrl('resources/css/app.css') ?>" />
    <link rel="stylesheet" href="<?= $assetUrl('resources/css/mobile.css') ?>" media="(max-width: 767.98px)" />
    <link rel="stylesheet" href="<?= $assetUrl('resources/css/desktop.css') ?>" media="(min-width: 768px)" />
</head>

<body class="app-body">
    <!-- Start Header -->
    <header class="site-header">
        <nav class="layout site-header__nav" aria-label="Global">
            <a href="/" class="site-header__brand">
                <span class="site-header__wordmark">PHPiggy</span>
            </a>

    <header class="bg-indigo-900">
        <nav class="mx-auto flex container items-center justify-between py-4" aria-label="Global">
            <a href="/" class="-m-1.5 p-1.5 text-white text-2xl font-bold">ZouTracks</a>

            <!-- Navigation Links -->
            <div class="site-header__links">
                <a href="/about" class="site-header__link">About</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/logout" class="site-header__link site-header__link--cta">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Logout
                    </a>
                <?php else: ?>
                    <a href="/login" class="site-header__link">Login</a>
                    <a href="/register" class="site-header__link site-header__link--cta">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="app-main">
