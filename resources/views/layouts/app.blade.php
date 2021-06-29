<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white mb-3 flex justify-between">
        <ul class="flex items-center">
            {{-- <li> --}}
                {{-- <a href="/home" class="p-3">Home</a> --}}
            {{-- </li> --}}
            {{-- <li> --}}
                {{-- <a href="/dashboard" class="p-3">Dashboard</a> --}}
            {{-- </li> --}}
            <li>
                <a href="{{route('posts')}}" class="p-3">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @if (Auth::user())
                <li>
                    <a href="" class="p-3">{{Auth::user()->name}}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-3">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>

</html>
