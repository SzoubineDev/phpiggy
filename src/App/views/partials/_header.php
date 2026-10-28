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

<body class="app-body flex flex-col min-h-screen bg-indigo-50 font-sans">
    <!-- Start Header -->
    <header class="site-header bg-indigo-900 text-white shadow-md">
        <nav class="container mx-auto px-4 flex items-center justify-between site-header__nav" aria-label="Global">
            <a href="/" class="site-header__brand flex items-center gap-2 text-white hover:text-white">
                <span class="site-header__logo inline-flex items-center justify-center w-9 h-9 rounded-lg bg-indigo-700/60" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.25M9 4.875c-.354-.167-.732-.28-1.125-.344m2.25-1.556A9.042 9.042 0 0112 2.25c4.97 0 9 3.03 9 6.75 0 1.825-.902 3.488-2.393 4.754M5.625 6.377A9.04 9.04 0 003 9c0 3.72 4.03 6.75 9 6.75.936 0 1.84-.112 2.695-.323" />
                    </svg>
                </span>
                <span class="site-header__wordmark text-xl font-bold">PHPiggy</span>
            </a>
            <!-- Navigation Links -->
            <div class="site-header__links flex items-center">
                <a href="/about" class="site-header__link text-gray-300 hover:text-white transition">About</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/logout" class="site-header__link site-header__link--cta inline-flex items-center gap-1.5 rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Logout
                    </a>
                <?php else: ?>
                    <a href="/login" class="site-header__link text-gray-300 hover:text-white transition">Login</a>
                    <a href="/register" class="site-header__link site-header__link--cta inline-flex items-center rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 transition">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="app-main w-full">
