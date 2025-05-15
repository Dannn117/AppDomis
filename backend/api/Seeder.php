<?php
require_once '../config/database.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$db = new Database();
$conn = $db->getConnection();

$restaurantes = [
    [
        "nombre" => "Sushi Express",
        "descripcion" => "Especialistas en sushi fresco y ramen.",
        "imagen_url" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVhz_y0qmMb0xHFwDQziCZQkQ-EMZ62AnlvQ&s"
    ],
    [
        "nombre" => "Pizzería Don Mario",
        "descripcion" => "Las mejores pizzas artesanales de la ciudad.",
        "imagen_url" => "https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/1d/67/50/pizza-carnera.jpg?w=900&h=500&s=1"
    ],
    [
        "nombre" => "Arepas La Abuela",
        "descripcion" => "Arepas rellenas con tradición colombiana.",
        "imagen_url" => "https://api.aunclic.com.co/storage/business/images/QJYZNPTAYA_20221116155338.png"
    ],
];

foreach ($restaurantes as $r) {
    $stmt = $conn->prepare("INSERT INTO restaurantes (nombre, descripcion, imagen_url) VALUES (:nombre, :descripcion, :imagen_url)");
    $stmt->bindParam(':nombre', $r['nombre']);
    $stmt->bindParam(':descripcion', $r['descripcion']);
    $stmt->bindParam(':imagen_url', $r['imagen_url']);
    $stmt->execute();
}

echo json_encode(["mensaje" => "¡Seed de restaurantes insertado con éxito!"]);
?>
