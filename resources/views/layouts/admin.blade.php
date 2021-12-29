<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>{{$title}}</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li style="font-size: 33px;">Admin Dashboard</li>
            </ul>
            <div class="text-end">
                <a href="/" class="btn btn-outline-light me-2">Home</a>
                <a href="/logout" class="btn btn-warning">LogOut</a>
            </div>
        </div>
    </div>
</header>

<div style="height: 92%;">
    <div style=" height: 100%; display: flex;">
        <nav class=" bg-light sidebar " style="width: 15%;">
            <div class="sidebar-sticky">
                <ul class="list-group">
                    <li class="list-group-item ">
                        <a href="/dashboard" class="text-dark h5">
                            Dashboard
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/dashboard/users" class="text-dark h5">
                            Users
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/dashboard/category" class="text-dark h5">
                            category
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/dashboard/product" class="text-dark h5">
                            Product
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>