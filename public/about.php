<?php

$title = 'About Us';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f4f4f4;
            color: #333;
        }

        .hero {
            background: #2d3748;
            color: white;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            margin-bottom: 15px;
            font-size: 3rem;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }

        .card h2 {
            margin-bottom: 15px;
            color: #2d3748;
        }

        .team {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .member {
            flex: 1;
            min-width: 220px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }

        .member h3 {
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 30px;
            background: #2d3748;
            color: white;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <section class="hero">
        <h1>About Our Company</h1>
        <p>Building modern web solutions with passion and creativity.</p>
    </section>

    <div class="container">

        <div class="card">
            <h2>Who We Are</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Repellendus laborum nostrum molestiae, provident aperiam
                officiis eligendi beatae dolores voluptates voluptatem.
            </p>
        </div>

        <div class="card">
            <h2>Our Mission</h2>
            <p>
                We strive to create simple, fast, and reliable software
                that helps businesses and individuals achieve their goals.
                Quality, innovation, and user experience are at the heart
                of everything we build.
            </p>
        </div>

        <h2 style="margin-bottom:20px;">Meet the Team</h2>

        <div class="team">
            <div class="member">
                <h3>John Doe</h3>
                <p>Lead Developer</p>
            </div>

            <div class="member">
                <h3>Jane Smith</h3>
                <p>UI/UX Designer</p>
            </div>

            <div class="member">
                <h3>Mike Johnson</h3>
                <p>Project Manager</p>
            </div>
        </div>

    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> My Company. All rights reserved.</p>
    </footer>

</body>

</html>