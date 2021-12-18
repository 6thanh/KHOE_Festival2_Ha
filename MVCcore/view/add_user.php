<?php
namespace view\add;

use controller\UserController\UserController;

include __DIR__ . '/../controller/UserController.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        
    </style>
</head>

<body>
<?php
    if($_POST){
        $UserController=new UserController();

        $_POST['name'] = test_input($_POST['name']);
        $_POST['gender'] = test_input($_POST['gender']);
        $_POST['email'] = test_input($_POST['email']);
        $_POST['tel'] = test_input($_POST['tel']);
        $_POST['password'] = test_input($_POST['password']);
        if(empty($_POST['stop_using'])){
            $_POST['stop_using'] = '0';
        }else{
            $_POST['stop_using'] = '1';
        };

        $UserController->add();
?>
    <div id="success-notify" class="text-center">
        <h4>You have successfully created an account <b> <?= $_POST['name'] ?> </b></h4>
        <a class="btn btn-success" href="index.php">User management</a>
    </div>
    <hr>
<?php }

function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

    <div class="container">
        <h1 class="text-center text-info m-3">Add User</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" 
            class="form-control w-25 bg-dark m-auto">
            <div class="form-range mt-3">
                <input class="w-100 rounded ps-2" type="text" name="name" 
                    pattern="[a-zA-Z-' ]{3,}" 
                    title="3 or more characters"
                    required placeholder="Name">
            </div> <br>

            <div class="form-range text-light">
                <input type="radio" class="ms-4 me-2" name="gender" id="male" value="0"><label for="male">Male</label>
                <input type="radio" class="ms-4 me-2" name="gender" id="female" value="1"><label for="female">Female</label>
            </div> <br>

            <div class="form-range mt-2">
                <input type="email" id="email" class="w-100 rounded ps-2" name="email" required placeholder="Email">
            </div>
            <span id="errorEmail"></span>
            <br>

            <div class="form-range mt-2">
                <input type="tel" class="w-100 rounded ps-2" name="tel" minlength="10" maxlength="11"
                    pattern="^(84|0)[1-9]+[0-9]{8}$"
                    title="Phone number starting with 0 or 84 followed by 9 digits, where the first digit cannot be 0"
                    required placeholder="Phone number">
            </div> <br>

            <div class="form-range mt-2">
                <input id="password" type="password" class="w-75 rounded ps-2" name="password" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Password has 8 characters or more; have at least 1 uppercase character, 1 special character and 1 number" 
                    required placeholder="Password">
                <span id="eye" class="text-light" style="cursor:pointer">
                    <i class="far fa-eye" title="Hide password"></i>
                </span>
            </div> <br>

            <div class="form-range mt-2">
                <input type="password" class="w-75 rounded ps-2" name="rePassword" 
                title="Confirm Password"
                required placeholder="Confirm Password"
                id="rePassword">
                <span id="errorPass"></span>
            </div> <br>

            <div>
                <input type="checkbox" id="stop_using" class="text-left form-check-input" name="stop_using" value="1">
                <label class="text-light ps-2" for="stop_using">Stop Using</label>
            </div>
            <div class="btn mt-2">
                <input type="reset" class="ms-5 px-2 btn-success rounded" value="Reset">
                <input type="submit" class="ms-5 px-2 btn-success rounded" value="Save">
            </div>
        </form>
    </div>

    <script src="checkInput.js"></script>

</body>


</html>