<?php
session_start();
require_once "conexion.php";
$conexion = conexion();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $correo = $_POST["correo"];
    $contraseña_ingresada = $_POST["contraseña"];

    $busqueda = $conexion->query("SELECT contraseña FROM usuario WHERE correo= '$correo';");

    if($fila = $busqueda->fetch_assoc()){   // usamos if porque solo esperamos una fila
        if(password_verify($contraseña_ingresada, $fila["contraseña"])){
            // Guardamos el correo en la sesión
            $_SESSION["correo"] = $correo;

            // Redirigimos a la página inicial
            header("Location: pagina_inicial.php");
            exit;
        } else {
            echo "<p style='color:red;'>Contraseña incorrecta</p>";
        }
    } else {
        echo "<p style='color:red;'>Correo no encontrado</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        form{
            border: 2px solid black; border-radius: 10px;
            box-shadow: 1px 1px 20px gainsboro; 
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 30px;
            justify-content: center;
            align-items: center;
        }
        button{
            color: white;
            background-color: black;
            border-radius: 10px; border: none;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="?" method="POST">
        <h2>Iniciar sesion</h2>
        <div class="contenedor-input">
            <label for="correo">Correo:</label><br>
            <input type="text" name="correo" placeholder="Introduce un correo">
        </div>
        <div class="contenedor-input">
            <label for="contraseña">Contraseña:</label><br>
            <input type="password" name="contraseña" placeholder="Introduce una contraseña">
        </div>
        <button type="submit">Acceder</button>
    </form>
</body>
</html>
