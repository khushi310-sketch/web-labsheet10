<?php
require "db.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    $result = $conn->query("SELECT * FROM products");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

if ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("INSERT INTO products(name,price) VALUES(?,?)");
    $stmt->bind_param("sd", $data['name'], $data['price']);
    $stmt->execute();

    echo json_encode(["message" => "Product Added"]);
}

if ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("UPDATE products SET name=?, price=? WHERE id=?");
    $stmt->bind_param("sdi", $data['name'], $data['price'], $data['id']);
    $stmt->execute();

    echo json_encode(["message" => "Product Updated"]);
}

if ($method == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $data['id']);
    $stmt->execute();

    echo json_encode(["message" => "Product Deleted"]);
}
?>