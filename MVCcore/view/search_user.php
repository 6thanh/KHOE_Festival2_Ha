<?php

namespace view\search;

use controller\UserController\UserController;

include '../controller/UserController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <?php

    $UserController = new UserController();
    $UserController->setSearch($_POST['search_query']);

    if (isset($_REQUEST['seach_submit'])) {
        $search = addslashes($_POST['search_query']);
        if (empty($search)) {
            echo "Please enter the information you are looking for!";
            echo '';
        } else {
            $user = $UserController->search();
            if ($user == "") {
                echo '<div class="container">';
                echo "<h4 class='mt-5'>Couldn't find information by keyword <b>' $search '</b> </h4>";
                echo '<br>';
                echo '<a class="btn btn-success" href="index.php">User management</a>';
                echo '<hr></div';
            } else { ?>

                <div class="container">
                    <?php echo '<br><h1>Information found by keyword " <b>' . $search . '</b> " is:</h1> <br>
                                <a class="btn btn-success" href="index.php">User management</a>
                                <hr>'; ?>
                    <table class='table table-bordered mt-2'>
                        <tr class="text-white bg-secondary ">
                            <th class="text-center">User_id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Stop Using</th>
                            <th class="text-center">Function</th>
                        </tr>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_gender'] == 0 ? "male" : "female" ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td><?= $user['user_tel'] ?></td>
                            <td><?= $user['user_password'] ?></td>
                            <td><input type="checkbox" readonly class="form-check-input" <?php if ($user['stop_using'] == '1') echo 'checked'; ?>></td>
                            <td class="border">
                                <a class="btn btn-primary" href="edit_user.php?id=<?= $user['user_id']; ?>" role="button" title="Edit user"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="delete_user.php?id=<?= $user['user_id']; ?>" role="button" title="Delete user"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</body>

</html>