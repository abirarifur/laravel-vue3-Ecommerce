<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin-Panel</title>
        <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">

        <!-- Fonts -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Montserrat+Alternates:ital,wght@0,300;0,400;0,600;0,800;1,400;1,600;1,800&family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div id="app">
                <div class="left-side">
                    <div class="sidebar-wrapper">
                        <div class="logo">
                            <img src="{{asset('img/logo.png')}}" alt="Logo" width="60px" height="60px" class="logoImg">
                            <div class="logo-text">Admin Panel</div>
                        </div>
                        <hr>
                        <div class="menu">
                        <div class="menu-list">
                                <div class="menu-name">
                                    <i class="fas fa-cart-plus"></i>
                                        Dashboard
                                </div>
                            </div>
                            <div class="menu-list">
                                <div class="menu-name" data-bs-toggle="collapse" href="#products" role="button" aria-expanded="false" aria-controls="products">
                                    <i class="fas fa-cart-plus"></i>
                                        Products
                                </div>
                                <div class="collapse" id="products">
                                    <ul class="list-group list-group-flush bg-dark">
                                        <li class="list-group-item bg-dark text-white">An item</li>
                                        <li class="list-group-item bg-dark text-white">A second item</li>
                                        <li class="list-group-item bg-dark text-white">A third item</li>
                                        <li class="list-group-item bg-dark text-white">A fourth item</li>
                                        <li class="list-group-item bg-dark text-white">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu-list">
                                <div class="menu-name" data-bs-toggle="collapse" href="#orders" role="button" aria-expanded="false" aria-controls="orders">
                                    <i class="fas fa-cart-plus"></i>
                                        Orders
                                </div>
                                <div class="collapse" id="orders">
                                    <ul class="list-group list-group-flush bg-dark">
                                        <li class="list-group-item bg-dark text-white">An item</li>
                                        <li class="list-group-item bg-dark text-white">A second item</li>
                                        <li class="list-group-item bg-dark text-white">A third item</li>
                                        <li class="list-group-item bg-dark text-white">A fourth item</li>
                                        <li class="list-group-item bg-dark text-white">And a fifth one</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="right-side">

                    <div class="main-header">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">Navbar scroll</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Link
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            </div>
                        </div>
                        </nav>
                    </div>
                    <div class="content">
                        <div class="short-details">
                            <div class="card m-3">
                                <div class="card-header bg-dark">Products</div>
                                <div class="card-body bg-info d-flex justify-content-between">
                                    <div class="amount">50</div>
                                    <i class="fab fa-product-hunt"></i>
                                </div>
                            </div>
                            <div class="card m-3">
                            <div class="card-header bg-dark">Orders</div>
                                <div class="card-body bg-success d-flex justify-content-between">
                                    <div class="amount">50</div>
                                    <i class="fab fa-product-hunt"></i>
                                </div>
                            </div>
                            <div class="card m-3">
                            <div class="card-header bg-dark">Today's Amount</div>
                                <div class="card-body bg-warning d-flex justify-content-between">
                                    <div class="amount">50</div>
                                    <i class="fab fa-product-hunt"></i>
                                </div>
                            </div>
                            <div class="card m-3">
                            <div class="card-header bg-dark">Monthly Amount</div>
                                <div class="card-body bg-secondary d-flex justify-content-between">
                                    <div class="amount">50</div>
                                    <i class="fab fa-product-hunt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="chartDetails d-flex">
                            <div class="orderChart m-3">
                            <canvas id="myChart" width="400" height="100" aria-label="Hello ARIA World" role="img">

                            </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'My First dataset',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [0, 10, 5, 2, 20, 45],
  }]
};
const config = {
  type: 'line',
  data,
  options: {}
};
var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
    </body>
</html>
