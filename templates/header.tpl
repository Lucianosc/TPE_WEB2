<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>AirBnB</title>
</head>

<body class="h-100" style="background-color: #eee;">
    <div class="container-fluid" style="background-color: #eee;">
        <div class="row justify-content-between">
            <div class="col-lg">
                <img class="img-fluid" src="header-Airbnb.jpg" alt="header-Airbnb">
            </div>
            <div class="col-2">
                {if $sessionUser eq false}
                <div class="container">
                    <a href="login"><button type="button" class="btn btn-primary">Login</button></a>
                </div>
                {else}
                <div class="row">
                    <div class="col">
                        <h6>User: {$sessionUser}</h6>
                    </div>
                    <div class="col">
                        <a href="logout"><button type="button" class="btn btn-primary">Logout</button></a>
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-between" style="background-color: lightgrey;">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="showCities">Ciudades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showFlats">Departamentos</a>
                </li>
            </ul>
        </div>
    </nav>
