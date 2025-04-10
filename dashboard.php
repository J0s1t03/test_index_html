<?php
// Verificar si el usuario está logueado. En un entorno real, usarías una sesión.
session_start();

// Simulamos que el usuario está logueado si se llega a esta página
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Si no está logueado, redirigir al login
    header('Location: index.html');
    exit();
}

// Obtener el nombre de usuario (esto en una implementación real sería más seguro)
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            text-align: center;
        }
        .btn-logout {
            width: 100%;
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-logout:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Bienvenido, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Has iniciado sesión correctamente. Este es tu dashboard.</p>
        <button class="btn-logout" onclick="window.location.href='logout.php';">Cerrar sesión</button>
    </div>
</body>
</html>
 
