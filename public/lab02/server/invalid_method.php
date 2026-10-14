<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Unsupported</title>
</head>

<body>
    <section class="container min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">
                <div class="alert alert-danger" role="alert">
                    Methos <?= $_SERVER["REQUEST_METHOD"] ?> is not supported
                </div>
            </div>
        </div>
    </section>
</body>

</html>