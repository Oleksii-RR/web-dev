<?php
session_start();

$loginError = $_SESSION["login_error"] ?? null;
unset($_SESSION["login_error"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Session</title>
</head>

<body>
    <section class="container min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">

                <?php if (isset($_SESSION["user"])): ?>

                    <div class="alert alert-success" role="alert">
                        Hello, <?= htmlspecialchars($_SESSION["user"]["login"]) ?>!
                    </div>

                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-primary">
                            Log out
                        </button>
                    </form>

                <?php else: ?>

                    <h3 class="mb-3">Sign in</h3>

                    <?php if ($loginError): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($loginError) ?>
                        </div>
                    <?php endif; ?>

                    <form action="login.php" method="post">

                        <div class="mb-3">
                            <label for="login" class="form-label">
                                Login:
                            </label>

                            <input type="text" class="form-control" name="login" id="login" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password:
                            </label>

                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Proceed
                        </button>

                    </form>

                <?php endif; ?>

            </div>
        </div>
    </section>
</body>

</html>