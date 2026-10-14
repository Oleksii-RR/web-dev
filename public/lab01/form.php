<?php
$nameError = null;
$surnameError = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);

    if (empty(trim($name))) {
        $nameError = "Name must be provided";
    } elseif (preg_match("/\d/", $name)) {
        $nameError = "Name must not contain digits";
    }

    if (empty(trim($surname))) {
        $surnameError = "Surname must be provided";
    } elseif (preg_match("/\d/", $surname)) {
        $surnameError = "Surname must not contain digits";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Form</title>
</head>

<body>
    <section class="container min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">
                <form action="" method="post">
                    <?php if ($nameError == null && $surnameError == null && $_SERVER["REQUEST_METHOD"] == "POST"): ?>
                        <div class="alert alert-success" role="alert">
                            <?= "Hello " . htmlspecialchars($name) . " " . htmlspecialchars($surname) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>

                        <input type="text" class="form-control <?= $nameError ? 'is-invalid' : '' ?>" name="name"
                            id="name" value="<?= htmlspecialchars($name) ?? '' ?>">

                        <?php if ($nameError): ?>
                            <div class="invalid-feedback">
                                <?= $nameError ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname:</label>

                        <input type="text" class="form-control <?= $surnameError ? 'is-invalid' : '' ?>" name="surname"
                            id="surname" value="<?= htmlspecialchars($surname) ?? '' ?>">

                        <?php if ($surnameError): ?>
                            <div class="invalid-feedback">
                                <?= $surnameError ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>