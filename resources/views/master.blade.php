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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <Sidebar />
            </div>
            <div class="main-header">
                <navbar></navbar>
            </div>

            <router-view></router-view>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="{{mix('js/app.js')}}"></script>
    <!-- <script>
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
                label: 'Product Add Chart',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [5, 10, 5, 2, 20, 45],
            }]
        };
        const config = {
            type: 'line',
            data,
            options: {}
        };
        const configforProduct = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var orderChart = new Chart(
            document.getElementById('orderChart'),
            config
        );
        var productChart = new Chart(
            document.getElementById('productChart'),
            configforProduct
        );
    </script> -->
</body>

</html>