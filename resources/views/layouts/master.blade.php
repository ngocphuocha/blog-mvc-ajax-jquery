<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My laravel @yield('title')</title>
    <!-- CSS -->
    @yield('css')
    <!-- Tailwind css -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Jquery ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <section class="container mx-auto">
            <nav class="text-center bg-yellow-300 ">
                <ul class="inline-flex p-5">
                    <li><a class="px-5" href="/">Home</a></li>
                    <li><a class="px-5" href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a href="{{ route('users.forgot-pass')}}">Forgot password</a></li>
                    <li><a class="px-5" href="#">About us</a></li>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        @yield('content')
    </main>
    <footer></footer>
    <!-- Script -->
    @yield('js')
</body>

</html>