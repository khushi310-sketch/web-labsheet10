<?php
require "db.php";

$email = $_POST['email'] ?? '';
$token = bin2hex(random_bytes(32));
$expiry = date("Y-m-d H:i:s", time() + 1800);

$stmt = $conn->prepare(
    "UPDATE users SET reset_token=?, reset_expiry=? WHERE email=?"
);
$stmt->bind_param("sss", $token, $expiry, $email);
$stmt->execute();

echo "Reset token generated";
?>