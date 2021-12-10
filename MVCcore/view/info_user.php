<?php

namespace view\edit;

use controller\UserController\UserController;

include '../controller/UserController.php';

if ($_GET) {
    $UserController = new UserController();
    $UserController->setId($_GET['id']);
    $user = $UserController->getUser();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Info User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">Info User</h2>
        <a class="btn btn-success" href="index.php">User management</a>
        <a class="btn btn-primary" href="edit_user.php?id=<?= $user['user_id']; ?>" role="button" title="Edit user">
            <i class="fas fa-edit"></i>
        </a>
        <a class="btn btn-danger" href="delete_user.php?id=<?= $user['user_id']; ?>" role="button" title="Delete user">
            <i class="fas fa-trash-alt"></i>
        </a>
    </div>
    <hr>
    <div class="container w-25">
        <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
        <input type="text" name="name" class="form-control" readonly value="<?= $user['user_name'] ?>">
        <br>
        <input type="radio" class="my-2" name="gender" checked>
        <span><?= $user['user_gender'] == '0' ? "Male" : "Female"; ?></span>
        <input type="text" name="email" readonly class="form-control" value="<?= $user['user_email'] ?>">
        <br>
        <input type="phone" name="tel" readonly class="form-control" value="<?= $user['user_tel'] ?>">
        <br>
        <input type="text" name="password" readonly class="form-control" value="<?= $user['user_password'] ?>">
        <br>
        <input type="checkbox" name="stop_using" disabled 
            class="form-check-input" <?php if ($user['stop_using'] == '1') echo 'checked'; ?>>
        <span class="ps-2">Stop Using</span>
    </div>
</body>

</html>