<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>{$titulo}</title>
</head>

<body>
    <h1>{$titulo}</h1>
    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ciudades
        </button>
        <div class="dropdown-menu">
            {foreach from=$cities item=city}
                <button value="{$city->id_city}"name="select_city" type="submit">
                    <a class="dropdown-item"
                    href="city/{$city->nombre}">{$city->nombre}</a></button>
            {/foreach}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="showFlats">Todas</a>
        </div>
    </div>