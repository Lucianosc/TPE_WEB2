<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <link rel="stylesheet" href="css\style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>AirBnB</title>
</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div>
                <img class="img-fluid" src="images\header-Airbnb.jpg" alt="header-Airbnb">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="showCities">Ciudades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showFlats">Departamentos</a>
                </li>
            </ul>
            <div class="col-md-3 offset-md-7">
                {if $sessionUser eq false}
                <div class="col-md-3 offset-md-9">
                    <a href="login"><button type="button" class="btn btn-danger" id="btn-color">Login</button></a>
                    <a href="signUp"><button type="button" class="btn btn-danger" id="btn-color">Registrate</button></a>
                </div>
                {else}
                <div class="row">
                    <div class="col">
                        <h6>Usuario: {$sessionUser['USER']}</h6>
                    </div>
                    <div class="col">
                        {if $sessionUser eq true && $sessionUser['ROLE'] eq 0}
                        <a href="administer"><button type="button" class="btn btn-danger" id="btn-color">Administración</button></a>
                        {/if}
                        <a href="logout"><button type="button" class="btn btn-danger" id="btn-color">Logout</button></a>
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </nav>
