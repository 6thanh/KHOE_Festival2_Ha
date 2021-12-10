<?php

namespace view\edit;

use controller\UserController\UserController;

include '../controller/UserController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


</head>

<body>
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_POST) {
        $UserController = new UserController();

        $_POST['name'] = test_input($_POST['name']);
        $_POST['gender'] = test_input($_POST['gender']);
        $_POST['email'] = test_input($_POST['email']);
        $_POST['tel'] = test_input($_POST['tel']);
        $_POST['password'] = test_input($_POST['password']);
        if (empty($_POST['stop_using'])) {
            $_POST['stop_using'] = "0";
        }
        $UserController->setId($_POST['id']);
        $user = $UserController->update();
    ?>
        <div id="success-notify" class="text-center">
            <h4>Successfully updated </b></h4>
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

        <h2 class="text-center mt-3">Edit User</h2>
        <hr>
        <div class="container w-25">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                <input type="text" name="name" placeholder="Name" class="form-control" 
                pattern="[a-zA-Z-' ]{3,}" 
                title="3 or more characters" require value="<?= $user['user_name'] ?>">
                <br>
                <div class="form-range">
                    <input type="radio" class="ms-4 me-2" name="gender" id="male" value="0" <?php if ($user['user_gender'] == "0") echo "checked"; ?>>
                    <label for="male">Male</label>
                    <input type="radio" class="ms-4 me-2" name="gender" id="female" value="1" <?php if ($user['user_gender'] == "1") echo "checked"; ?>>
                    <label for="female">Female</label>
                </div>
                <br>
                <input type="text" id="email" name="email" placeholder="Email" require class="form-control" value="<?= $user['user_email'] ?>">
                <span id="errorEmail"></span>
                <br>
                <input type="phone" name="tel" placeholder="Phone" minlength="10" maxlength="11" require class="form-control" 
                    pattern="^(84|0)[1-9]+[0-9]{8}$" 
                    title="Phone number starting with 0 or 84 followed by 9 digits, where the first digit cannot be 0" value="<?= $user['user_tel'] ?>">
                <br>
                <div class="navbar">
                    <input type="password" name="password" id="password" placeholder="Password" require class="form-control w-75" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Password has 8 characters or more; have at least 1 uppercase character, 1 special character and 1 number" value="<?= $user['user_password'] ?>">
                    <span id="eye" class="mt-2 me-4" style="cursor:pointer">
                        <i class="far fa-eye" title="Hide password"></i>
                    </span>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="stop_using" class="text-left form-check-input" 
                        name="stop_using" value="1" <?php if ($user['stop_using'] == "1") echo "checked"; ?>>
                    <label class="ps-2" for="stop_using">Stop Using</label>
                </div><br>

                <div class="navbar mt-2">
                    <input type="submit" name="submit" value="Save" class="ms-5 px-3 btn btn-success" title="Save">
                    <a href="index.php" role="button" class="me-5 px-2 btn btn-success" title="User management">Cancel</a>
                </div>
            </form>

        </div>
    <?php } ?>

    <script src="checkInput.js"></script>
</body>

</html>