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

$cart = $_SESSION["cart"] ?? [];

$previousPurchases = json_decode(
    $_COOKIE["previous_purchases"] ?? "[]",
    true
);

if (!is_array($previousPurchases)) {
    $previousPurchases = [];
}

if (!empty($cart)) {
    $previousPurchases = array_merge(
        $previousPurchases,
        $cart
    );

    setcookie(
        "previous_purchases",
        json_encode($previousPurchases),
        [
            "expires" => time() + 30 * 24 * 60 * 60,
            "path" => "/",
            "domain" => "",
            "secure" => false,
            "httponly" => true
        ]
    );

    $_SESSION["cart"] = [];
}

header("Location: index.php");
exit;