<?php

require_once 'Persona.php';

// Función para sanitizar cadenas de texto
function sanitize_string($str)
{
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

// Función para mostrar los datos de la base de datos
function mostrar_datos($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM personas");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($resultados) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Fecha de Nacimiento</th><th>Teléfono</th><th>Género</th><th>País</th></tr>";
            foreach ($resultados as $fila) {
                echo "<tr>";
                echo "<td>" . sanitize_string($fila['id']) . "</td>";
                echo "<td>" . sanitize_string($fila['nombre']) . "</td>";
                echo "<td>" . sanitize_string($fila['apellido']) . "</td>";
                echo "<td>" . sanitize_string($fila['email']) . "</td>";
                echo "<td>" . sanitize_string($fila['fecha_nacimiento']) . "</td>";
                echo "<td>" . sanitize_string($fila['telefono']) . "</td>";
                echo "<td>" . sanitize_string($fila['genero']) . "</td>";
                echo "<td>" . sanitize_string($fila['pais']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos para mostrar.";
        }
    } catch (PDOException $e) {
        die("Error al mostrar datos: " . $e->getMessage());
    }
}

// Obtener datos del formulario y validar
$nombre = sanitize_string($_POST['nombre']);
$apellido = sanitize_string($_POST['apellido']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$fecha_nacimiento = sanitize_string($_POST['fecha']);
$telefono = sanitize_string($_POST['telefono']);
$genero = sanitize_string($_POST['genero']);
$pais = sanitize_string($_POST['pais']);

if (!$nombre || !$apellido || !$email || !$fecha_nacimiento || !$genero || !$pais) {
    die("Error: Datos inválidos.");
}

try {
    // Aquí debes establecer la conexión a la base de datos
    $dsn = 'mysql:host=localhost;dbname=persona';
    $username = 'root';  // Reemplaza con tu nombre de usuario
    $password = '';  // Reemplaza con tu contraseña

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertar datos en la base de datos
    $stmt = $pdo->prepare("INSERT INTO personas (nombre, apellido, email, fecha_nacimiento, telefono, genero, pais) VALUES (:nombre, :apellido, :email, :fecha_nacimiento, :telefono, :genero, :pais)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':pais', $pais);

    $stmt->execute();

    // Mostrar los datos de la base de datos
    mostrar_datos($pdo);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
} finally {
    // Cerrar la conexión
    $pdo = null;
}