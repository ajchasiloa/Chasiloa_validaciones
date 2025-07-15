<?php
// Habilitar visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro Exitoso</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex items-center justify-center min-h-screen p-4">
  <div class="bg-white p-8 rounded-lg shadow-md text-center max-w-md w-full">
    <h2 class="text-3xl font-bold text-green-700 mb-4">¡Registro exitoso!</h2>
    <p class="mb-6 text-gray-700">Tu información ha sido guardada correctamente.</p>
    <a href="index.html" class="inline-block bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
      Hacer otro registro
    </a>
  </div>
</body>
</html>
