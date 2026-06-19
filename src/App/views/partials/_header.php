<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHPiggy - Transaction Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/main.css" />
</head>

<body class="bg-indigo-50 font-['Outfit']">
    <!-- Start Header -->
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-inner">
                <a href="/" class="header-logo">Wallet</a>

                <!-- Desktop Nav -->
                <nav class="header-nav">
                    <a href="/" class="header-link">Home</a>
                    <a href="/transaction" class="header-link">Transactions</a>
                    <a href="/about" class="header-link">About</a>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/logout" class="header-link">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="header-link">Login</a>
                        <a href="/register" class="header-link">Register</a>
                    <?php endif; ?>
                </nav>

                <!-- Mobile menu button -->
                <button class="header-menu-btn" onclick="document.getElementById('mobileNav').classList.toggle('open')" aria-label="Toggle menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Nav -->
            <nav id="mobileNav" class="header-mobile-nav">
                <a href="/" class="header-link">Home</a>
                <a href="/transaction" class="header-link">Transactions</a>
                <a href="/about" class="header-link">About</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/logout" class="header-link">Logout</a>
                <?php else: ?>
                    <a href="/login" class="header-link">Login</a>
                    <a href="/register" class="header-link">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <!-- End Header -->