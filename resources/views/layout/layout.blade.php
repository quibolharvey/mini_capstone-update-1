<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>BicepCurlFit</title>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-900">

    <!-- Navbar -->
    @include('components.sidebar')

    <!-- Main Content Area -->
    <div class="flex flex-1 justify-center bg-sky-100 shadow-md rounded-lg overflow-auto">
        @yield('content')
    </div>

</body>

</html>
