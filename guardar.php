<?php
// Habilitar visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar el buffer de salida para evitar problemas con encabezados
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_usuarios";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para limpiar datos
function limpiar($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Recoger los datos del formulario
$nombre = limpiar($_POST['nombre']);
$apellido = limpiar($_POST['apellido']);
$cedula = limpiar($_POST['cedula']);
$telefono = limpiar($_POST['telefono']);
$fechaNacimiento = limpiar($_POST['fechaNacimiento']);
$genero = limpiar($_POST['genero']);
$direccion = limpiar($_POST['direccion']);
$salario = limpiar($_POST['salario']);
$email = limpiar($_POST['email']);
$sitioWeb = limpiar($_POST['sitioWeb']);
$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

// Preparar la consulta SQL
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, cedula, telefono, fechaNacimiento, genero, direccion, salario, email, sitioWeb, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error en la preparación: " . $conn->error);
}

// Asignar los parámetros a la consulta
$stmt->bind_param("sssssssssss", $nombre, $apellido, $cedula, $telefono, $fechaNacimiento, $genero, $direccion, $salario, $email, $sitioWeb, $contrasena);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Registro exitoso: redirigir a la vista de confirmación
    header("Location: confirmacion.php");
    exit();
} else {
    echo "❌ Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Finalizar el buffer de salida
ob_end_flush();
?>
