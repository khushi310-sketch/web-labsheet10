<?php
session_start();

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        die("Invalid CSRF Token");
    }

    echo "Form Submitted";
}
?>

<form method="post">
<input type="hidden" name="csrf"
value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
<input name="name" placeholder="Name">
<button>Submit</button>
</form>