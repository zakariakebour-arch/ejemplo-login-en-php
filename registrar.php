<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
        <h2>Registrarse</h2>
        <div class="contenedor-input">
            <label for="correo">Correo:</label><br>
            <input type="text" name="correo" placeholder="Introduce un correo">
        </div>
        <div class="contenedor-input">
            <label for="contraseña">Contraseña:</label><br>
            <input type="password" name="contraseña" placeholder="Introduce una contraseña">
        </div>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
<?php
    require_once "conexion.php";
    $conexion = conexion();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $correo = $_POST["correo"];
        $contraseña_hash = password_hash($_POST["contraseña"],PASSWORD_DEFAULT);
        // Insertamos los datos a la tabla en la base de datos
        $insertar = $conexion->query("INSERT INTO usuario (correo,contraseña) VALUES('$correo','$contraseña_hash');");
        //Antes hacemos una comprobacion de que si falla la ejecucion muestre error y si se cumple nos manda a otro archivo
        if($insertar){
            header("Location: iniciar_sesion.php");
            exit;
        }else{
            echo "Algo salio mal";
        }
    }
?>
