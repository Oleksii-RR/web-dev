<?php
$cookieName = "username";
$nameError = $_GET["error"] ?? null;
$name = $_GET["name"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Cookie</title>
</head>

<body>
    <section class="container min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">

                <?php if (isset($_COOKIE[$cookieName])): ?>

                    <div class="alert alert-success" role="alert">
                        Hello, <?= htmlspecialchars($_COOKIE[$cookieName]) ?>
                    </div>

                    <form action="cookie.php" method="post">
                        <input type="hidden" name="action" value="forget_user">

                        <button type="submit" class="btn btn-primary">
                            Forget me
                        </button>
                    </form>

                <?php else: ?>

                    <form action="cookie.php" method="post">
                        <input type="hidden" name="action" value="remember_user">

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Enter your name:
                            </label>

                            <input type="text" class="form-control <?= $nameError ? 'is-invalid' : '' ?>" name="name"
                                id="name" value="<?= htmlspecialchars($name) ?>">

                            <?php if ($nameError): ?>
                                <div class="invalid-feedback">
                                    Name must be provided
                                </div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Remember me
                        </button>
                    </form>

                <?php endif; ?>

            </div>
        </div>
    </section>
</body>

</html>