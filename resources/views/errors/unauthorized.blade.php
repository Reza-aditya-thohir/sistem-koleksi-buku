<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 72px;
            color: #dc3545;
        }
        p {
            font-size: 20px;
            color: #6c757d;
        }
        a {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>404 Error</h1>
    <p>Sorry, the page you are looking for could not be found.</p>
    <p><a href="{{ url('/') }}">Go back to Home</a></p>
</body>
</html>
