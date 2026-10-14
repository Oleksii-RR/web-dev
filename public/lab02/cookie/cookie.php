<?php

$cookieName = "username";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$action = $_POST["action"] ?? "";

if ($action === "remember_user") {
    $name = trim($_POST["name"] ?? "");

    if ($name === "") {
        header("Location: index.php?error=true");
        exit;
    }

    setcookie(
        $cookieName,
        $name,
        time() + (86400 * 7),
        "/",
        "",
        false,
        true
    );

} elseif ($action === "forget_user") {
    setcookie(
        $cookieName,
        "",
        time() - 3600,
        "/",
        "",
        false,
        true
    );
}

header("Location: index.php");
exit;