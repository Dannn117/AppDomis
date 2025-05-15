<?php
require_once '../config/database.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$restaurante_id = $_GET['restaurante_id'] ?? 0;

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * FROM productos WHERE restaurante_id = :id");
$stmt->bindParam(':id', $restaurante_id, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
