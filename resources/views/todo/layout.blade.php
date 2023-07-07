<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap.css">
    <link rel="stylesheet" href="/font/css/all.css">
    <title> @yield('title') </title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="/main.js"></script>
    <script src="/bootstrap.bundle.min.js"></script>
</body>
</html>