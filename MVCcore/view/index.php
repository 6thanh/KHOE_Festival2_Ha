<?php

use controller\UserController\UserController;

include '../controller/UserController.php';

$UserController = new UserController();
$row = $UserController->showDatabase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Core</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
        table tr:nth-child(odd) {
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container w-auto mt-3">
        <form action="<?php echo htmlspecialchars('search_user.php') ?>" method="post" class="form-control">
            <input type="search" class="mt-3 w-auto border-0 form-check-input" name="search_query" placeholder="Enter search keywords" required>
            <button type="submit" name="seach_submit" class="btn mt-1"><i class="fas fa-search"></i></button>
        </form>
        <div class="border bg-info mt-3">
            <h2 class="text-light text-center m-2">User management</h2>
        </div>
        <div class="mt-2">
            <a class="btn btn-success" href="add_user.php" role="button">Add User</a>
        </div>
        <table class='table table-bordered mt-2'>
            <tr class="text-white bg-secondary ">
                <th class="text-center">Number</th>
                <th class="text-center">User_id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Password</th>
                <th class="text-center">Stop Using</th>
                <th class="text-center">Action</th>
            </tr>
            <?php for ($i = 0; $i < count($row); $i++) { ?>
                <tr>
                    <td class="text-center"><?= $i + 1 ?></td>
                    <td><?= $row[$i]['user_id'] ?></td>
                    <td><?= $row[$i]['user_name'] ?></td>
                    <td><?= $row[$i]['user_gender'] == 0 ? "male" : "female" ?></td>
                    <td><?= $row[$i]['user_email'] ?></td>
                    <td><?= $row[$i]['user_tel'] ?></td>
                    <td><?= $row[$i]['user_password'] ?></td>
                    <td><input type="checkbox" disabled class="form-check-input" <?php if ($row[$i]['stop_using'] == '1') echo 'checked'; ?>></td>
                    <td class="border">
                        <a class="btn btn-success" href="info_user.php?id=<?= $row[$i]['user_id']; ?>" role="button" title="Info user"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary" href="edit_user.php?id=<?= $row[$i]['user_id']; ?>" role="button" title="Edit user"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="delete_user.php?id=<?= $row[$i]['user_id']; ?>" role="button" title="Delete user"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>