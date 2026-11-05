<?php
$token = "my_secret_token";

$headers = getallheaders();

if (($headers['Authorization'] ?? '') !== "Bearer ".$token) {
    http_response_code(401);
    exit(json_encode(["error" => "Unauthorized"]));
}

echo json_encode(["message" => "Access Granted"]);
?>