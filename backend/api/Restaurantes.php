<?php
require_once '../config/database.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$db = new Database();
$conn = $db->getConnection();

$nombre = $_GET['nombre'] ?? '';

// Si hay filtro, hacer búsqueda por LIKE
if ($nombre !== '') {
    $stmt = $conn->prepare("SELECT * FROM restaurantes WHERE LOWER(nombre) LIKE LOWER(:nombre)");
    $stmt->bindValue(':nombre', '%' . $nombre . '%');
} else {
    $stmt = $conn->prepare("SELECT * FROM restaurantes");
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
