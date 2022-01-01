<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>{{$title}}</title>
</head>
    <body>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li>
                            <a href="/" class="nav-link px-2 text-white">Home</a>
                        </li>
                        <li>
                            <a href="/product" class="nav-link px-2 text-white"> product</a>
                        </li>
                        @if (auth()->user()&&auth()->user()->is_admin==1)
                            <li>
                                <a href="/dashboard" class="nav-link px-2 text-white">dashboard</a>
                            </li>
                        @endif
                    </ul>
                    <div class="text-end">
                        @if (auth()->user())
                            <a href="/cart" class="btn btn-success me-2">cart</a>
                            <form action="/logout" method="post" style="display: inline;">
                                @csrf
                                <button class="btn btn-danger">logOut</button>
                            </form>
                        @else
                            <a href="/login" class="btn btn-outline-light me-2">Login</a>
                            <a href="/register" class="btn btn-warning">Sign-up</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>