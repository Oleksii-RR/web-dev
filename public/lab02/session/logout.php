<?php
session_start();

$_SESSION = [];

if (ini_get("session.use_cookies")) {
    setcookie(
        session_name(),
        "",
        time() - 3600,
        "/",
        "",
        false,
        true
    );
}

session_destroy();

header("Location: index.php");
exit;