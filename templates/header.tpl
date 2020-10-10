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
    <title>{$titulo}</title>
</head>

<body>
    <header class="header">
        <div>
            <h1>{$titulo}</h1>
        </div>
        <div>
            {if $sessionUser eq false}
                <a href="login" class="button1">Login</a>
            {else}
                <div class="header">
                    <h6>User: {$sessionUser}</h6>
                    <a href="logout" class="button1">Logout</a>
                </div>
            {/if}
        </div>
    </header>
    <ul class="navigation">
        <li><a href="showCities">Ciudades</a></li>
        <li><a href="showFlats">Departamentos</a></li>
    </ul>