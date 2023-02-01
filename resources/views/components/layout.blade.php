<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
    <title>My blog</title>
</head>

<body>
    <section class="px-6 py-8">
        {{ $slot }}
    </section>
</body>

</html>
