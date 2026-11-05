<?php
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

$age = filter_var($_POST['age'], FILTER_VALIDATE_INT);

$url = filter_var($_POST['url'], FILTER_VALIDATE_URL);

$name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');

if ($email && $age !== false && $url) {
    echo "Valid Input";
} else {
    echo "Invalid Input";
}
?>