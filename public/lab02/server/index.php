<?php
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    header("Location: invalid_method.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Server stats</title>
</head>

<body>
    <section class="container min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Paramether</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Client IP</td>
                            <td><?= $_SERVER["REMOTE_ADDR"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Browser</td>
                            <td><?= $_SERVER["HTTP_USER_AGENT"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Request Method</td>
                            <td><?= $_SERVER["REQUEST_METHOD"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Script Name</td>
                            <td><?= $_SERVER["PHP_SELF"] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>File Path</td>
                            <td><?= $_SERVER["SCRIPT_FILENAME"] ?></td>
                        </tr>

                        SCRIPT_FILENAME
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</body>

</html>