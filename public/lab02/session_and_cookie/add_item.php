<?php
session_start();

$expiry = 300;

if (isset($_SESSION["last_activity"]) && time() - $_SESSION["last_activity"] > $expiry) {
    $_SESSION = [];
    session_regenerate_id(true);

    header("Location: index.php");
    exit;
}

$_SESSION["last_activity"] = time();

$products = [
    "Apple",
    "Banana",
    "Orange",
    "Mango",
];

$product = $_POST["product"] ?? "";

if (in_array($product, $products, true)) {
    $_SESSION["cart"] ??= [];
    $_SESSION["cart"][] = $product;
}

header("Location: index.php");
exit;