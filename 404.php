<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            background-color: #fff;
        }
        .error-container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
        }
        .ghost {
            width: 80px;
            height: 80px;
            background: #f47c7c;
            border-radius: 40px 40px 0 0;
            position: relative;
            margin: 0 auto 20px;
        }
        .ghost::before {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            top: 30px;
            left: 20px;
            box-shadow: 32px 0 0 white;
        }
        .ghost::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 20px;
            background: #f47c7c;
            bottom: -10px;
            left: 0;
            border-radius: 0 0 15px 15px;
        }
        .error-code {
            font-size: 120px;
            color: #f47c7c;
            margin: 0;
            font-weight: normal;
            line-height: 1;
        }
        .error-message {
            font-size: 32px;
            color: #333;
            margin: 20px 0;
            font-weight: normal;
        }
        .error-description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            padding: 0 20px;
        }
        .back-home {
            display: inline-block;
            padding: 15px 30px;
            background-color: #f47c7c;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            transition: background-color 0.2s;
        }
        .back-home:hover {
            background-color: #e76c6c;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="ghost"></div>
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Oops! Page Not Found</h2>
        <p class="error-description">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Don't worry though, we'll help you find your way back!</p>
        <a href="index.php" class="back-home">Return to Homepage</a>
    </div>
</body>
</html> 