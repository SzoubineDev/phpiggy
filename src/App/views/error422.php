<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>422 - Unprocessable Entity</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f5f7fb;
        }

        .container {
            text-align: center;
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
            max-width: 600px;
            width: 90%;
        }

        h1 {
            font-size: 90px;
            color: #f39c12;
        }

        h2 {
            margin: 10px 0;
            color: #333;
        }

        p {
            color: #666;
            line-height: 1.7;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            text-decoration: none;
            background: #f39c12;
            color: white;
            padding: 12px 28px;
            border-radius: 8px;
            transition: .3s;
        }

        a:hover {
            background: #d68910;
        }

        .icon {
            font-size: 60px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="icon">⚠️</div>

        <h1>422</h1>

        <h2>Unprocessable Entity</h2>

        <p>
            The request was received successfully,
            but some of the submitted information is invalid.
            Please review your input and try again.
        </p>

        <a href="/">Return Home</a>

    </div>

</body>

</html>