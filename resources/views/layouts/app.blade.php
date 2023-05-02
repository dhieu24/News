<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="bg-gray-100">
        <nav class="p-6 bg-white flex justify-between mb-4">
            <ul class="flex items-center">
                <li>
                    <a href="/home" class="p-3">Home</a>
                </li>

                <li>
                    <a href="/dashboard" class="p-3">Dashboard</a>
                </li>

                <li>
                    <a href="/posts" class="p-3">Metrics</a>
                </li>
            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>

                    <li>
                        <form action="/logout" method="POST" class="p-3 inline">
                            @csrf
                            <button>Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href='/register' class="p-3">Register</a>
                    </li>

                    <li>
                        <a href="/login" class="p-3">Login</a>
                    </li>
                @endguest
            </ul>
        </nav>

        @yield('content')
    </body>
</html>