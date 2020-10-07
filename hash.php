<?php

$pass= "12345";
echo "La contraseña del user es:";
echo "</br>";
echo $pass;
echo "</br>";
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo "El hash de la password del user es:";
echo $hash;
echo "</br>";

//lo que ingresa el usuario

$passwordInput = "mermelada";
echo "Lo que ingreso el user es:";
echo "</br>";
echo $passwordInput;
echo "</br>";

if(password_verify($passwordInput, $hash))
    echo "Credenciales válidas";
else
echo "Credenciales inválidas";


?>