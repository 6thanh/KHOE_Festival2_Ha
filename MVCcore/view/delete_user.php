<?php

namespace view\delete;

use controller\UserController\UserController;

include '../controller/UserController.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <?php
    if ($_POST) {
        $UserController = new UserController();
        $UserController->setId($_POST['id']);
        $user = $UserController->delete();
    ?>
        <div id="success-notify" class="text-center mt-5">
            <h4>Successfully delete </b></h4>
            <a class="btn btn-success" href="index.php">User management</a>

        </div>
        <hr>
    <?php
    } else {
        if ($_GET) {
            $UserController = new UserController();
            $UserController->setId($_GET['id']);
            $user = $UserController->getUser();
        }
    ?>

        <h2 class="text-center mt-3">Are you sure you want to delete this User?</h2>
        <hr>
        <div class="container w-25">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                <input type="text" name="name" class="form-control" readonly value="<?= $user['user_name'] ?>">
                <br>
                <input type="radio" class="my-3" name="gender" checked>
                <span><?= $user['user_gender'] == '0' ? "Male" : "Female"; ?></span>
                <input type="text" name="email" readonly class="form-control" value="<?= $user['user_email'] ?>">
                <br>
                <input type="phone" name="tel" readonly class="form-control" value="<?= $user['user_tel'] ?>">
                <br>
                <input type="text" name="password" readonly class="form-control" value="<?= $user['user_password'] ?>">
                <br>
                <input type="checkbox" name="stop_using" disabled class="form-check-input" <?php if ($user['stop_using'] == '1') echo 'checked'; ?>>
                <span class="ps-2">Stop Using</span>
                <br>
                <div class="mt-2 navbar">
                    <input type="submit" name="submit" value="Yes" class="ms-5 px-4 btn btn-danger">
                    <a href="index.php" role="button" class="me-5 px-4 btn btn-success" title="User management">No</a>
                </div>
            </form>

        </div>
    <?php } ?>
</body>

</html>