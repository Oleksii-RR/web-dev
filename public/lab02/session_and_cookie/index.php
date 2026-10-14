<?php
session_start();

$expiry = 300;
$expired = false;

if (
    isset($_SESSION["last_activity"]) &&
    time() - $_SESSION["last_activity"] > $expiry
) {
    $_SESSION = [];
    $expired = true;
}

$_SESSION["last_activity"] = time();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

$products = [
    "Apple",
    "Banana",
    "Orange",
    "Mango",
];

$previousPurchases = json_decode(
    $_COOKIE["previous_purchases"] ?? "[]",
    true
);

if (!is_array($previousPurchases)) {
    $previousPurchases = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Shopping Cart</title>
</head>

<body>
    <section class="container py-5">

        <h1 class="mb-4">Shopping Cart</h2>

            <?php if ($expired): ?>
                <div class="alert alert-warning">
                    Your session has expired and your cart has been cleared.
                </div>
            <?php endif; ?>

            <h2>Products</h2>

            <?php foreach ($products as $product): ?>
                <form action="add_item.php" method="post" class="mb-2">
                    <?= htmlspecialchars($product) ?>

                    <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">

                    <button class="btn btn-primary btn-sm">
                        Add to cart
                    </button>
                </form>
            <?php endforeach; ?>

            <hr>

            <h2>Your cart</h2>

            <?php if (empty($_SESSION["cart"])): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($_SESSION["cart"] as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>

                <form action="checkout.php" method="post">
                    <button class="btn btn-success">
                        Buy products
                    </button>
                </form>
            <?php endif; ?>

            <hr>

            <h3>Previous purchases</h3>

            <?php if (empty($previousPurchases)): ?>
                <p>No previous purchases.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($previousPurchases as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

    </section>
</body>

</html>