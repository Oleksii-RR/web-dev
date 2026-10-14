<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

$login = trim($_POST["login"] ?? "");
$password = $_POST["password"] ?? "";

if ($login == "" || $password == "") {
    $_SESSION["login_error"] = "Login and password required";
    header("Location: index.php");
    exit;
}

session_regenerate_id(true);

$_SESSION["user"] = [
    "login" => $login,
    "password" => $password
];

header("Location: index.php");
exit;
