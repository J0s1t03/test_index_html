<?php
// Iniciar sesión
session_start();

// Destruir la sesión y redirigir al formulario de login
session_unset();    // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión
header('Location: index.html');  // Redirigir al login
exit();
?>
 
