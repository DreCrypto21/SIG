<!DOCTYPE html>
<html>
<head>
    <title>403 - Forbidden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 48px;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>403 - Forbidden</h1>
    <p>You do not have access to this resource.</p>
    <p><a href="{{ url()->previous() }}">Go Back</a></p>
</body>
</html>
