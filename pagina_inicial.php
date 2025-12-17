<?php
    session_start();
    if(isset($_SESSION["correo"])){
        echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION["correo"]) . "</h1>";
    } else {
        // Si no hay sesion, redirigimos otra vez a la pagin de inicio de sesion
        header("Location: iniciar_sesion.php");
        exit;
    }
?>

