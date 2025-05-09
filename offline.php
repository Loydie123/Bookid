<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Internet Connection</title>
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
        .offline-container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
        }
        .wifi-icon {
            width: 80px;
            height: 80px;
            position: relative;
            margin: 0 auto 20px;
        }
        .wifi-icon::before {
            content: "";
            position: absolute;
            width: 60px;
            height: 60px;
            border: 8px solid #f47c7c;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.3;
        }
        .wifi-icon::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            background: #f47c7c;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .error-title {
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
        .retry-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #f47c7c;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            transition: background-color 0.2s;
            cursor: pointer;
            border: none;
        }
        .retry-button:hover {
            background-color: #e76c6c;
        }
    </style>
</head>
<body>
    <div class="offline-container">
        <div class="wifi-icon"></div>
        <h1 class="error-title">No Internet Connection</h1>
        <p class="error-description">Please check your internet connection and try again.</p>
        <button class="retry-button" onclick="window.location.reload()">Try Again</button>
    </div>
</body>
</html> 