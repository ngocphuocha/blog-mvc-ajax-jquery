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
            <nav class="bg-yellow-400">
                <ul class="flex flex-row justify-end">
                    @auth
                    <ul class="flex flex-row justify-end">
                        <li class="p-2 my-1">{{\Auth::user()->name}}</li>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                            <input
                                class="bg-green-300 p-2 rounded-sm my-1 mr-2 cursor-pointer hover:text-yellow-300 transition delay-150 duration-300 ease-in-out"
                                type="submit" value="Logout">
                        </form>
                        </li>
                    </ul>
                    @endauth
                    @guest
                    <li><a href="{{ route('login') }}" class="p-2">Login</a></li>
                    <li><a class="p-2">Register</a></li>
                    @endguest

                </ul>
            </nav>
        </section>
        <section class="container mx-auto">
            <nav class="text-center bg-yellow-300 ">
                <ul class="inline-flex p-5">
                    {{-- Home --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500" href="/">Home
                        </a>
                    </li>

                    {{-- Posts --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500"
                            href="{{ route('posts.index') }}">Posts
                        </a>
                    </li>

                    {{-- Products --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500"
                            href="{{ route('products.index') }}">Products
                        </a>
                    </li>

                    {{-- Cart --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500"
                            href="{{ route('carts.index') }}">View cart
                        </a>
                    </li>

                    {{-- Forgot password send mail view --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500"
                            href="{{ route('users.forgot-pass')}}">Forgot password
                        </a>
                    </li>

                    {{-- About us --}}
                    <li>
                        <a class="px-5 transition duration-150 ease-out hover:text-red-500" href="#">About us
                        </a>
                    </li>
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