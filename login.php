<?php
// Iniciar sesión
session_start();

// Simulación de base de datos de usuarios (en un caso real, usarías una base de datos)
$valid_users = [
    'daniel' => 'trustnoone',
    'miguel' => 'god999',
];

// Obtener los datos del formulario
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Obtener la dirección IP del cliente
$user_ip = $_SERVER['REMOTE_ADDR'];

// Ruta del archivo de log
$logfile = 'login_attempts.log';

// Función para escribir en el archivo de log
function log_attempt($username, $user_ip, $success) {
    global $logfile;

    // Obtener la fecha y hora actual
    $timestamp = date('Y-m-d H:i:s');
    
    // Determinar el resultado del intento de login
    $result = $success ? 'Éxito' : 'Fallido';
    
    // Crear la entrada en el log
    $log_entry = "[$timestamp] IP: $user_ip - Usuario: $username - Intento: $result\n";

    // Escribir en el archivo de log
    file_put_contents($logfile, $log_entry, FILE_APPEND);
}

// Verificar si el usuario y la contraseña son correctos
if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
    // Login exitoso
    log_attempt($username, $user_ip, true); // Escribir en el log con resultado exitoso
    
    // Guardar el estado de login en la sesión
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;

    // Retornar respuesta JSON y redirigir al dashboard
    echo json_encode(['success' => true, 'redirect' => 'dashboard.php']);  // Indicamos que se redirija a dashboard.php
} else {
    // Login fallido
    log_attempt($username, $user_ip, false); // Escribir en el log con resultado fallido
    echo json_encode(['success' => false]);  // Solo devolvemos el estado de fallo
}
?>
