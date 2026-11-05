<?php
session_start();

$_SESSION['attempts'] = $_SESSION['attempts'] ?? 0;
$_SESSION['lock_until'] = $_SESSION['lock_until'] ?? 0;

if (time() < $_SESSION['lock_until']) {
    die("Account Locked");
}

if (isset($_POST['login'])) {
    $password = $_POST['password'];

    if ($password == "admin123") {
        $_SESSION['attempts'] = 0;
        echo "Login Successful";
    } else {
        $_SESSION['attempts']++;

        if ($_SESSION['attempts'] >= 3) {
            $_SESSION['lock_until'] = time() + 300;
            echo "Locked for 5 minutes";
        } else {
            echo "Invalid Password";
        }
    }
}
?>

<form method="post">
<input type="password" name="password">
<button name="login">Login</button>
</form>