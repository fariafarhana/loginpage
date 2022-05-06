<?php
include 'config.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$save = $_POST['save'];
$info = " ";
function getOK()
{
    $getOK = true;
    $info = "";
    if (!preg_match("/^[a-zA-Z-' ]{3,31}$/", $_POST['first_name'])) {
        $getOK = false;
        $info .= "<strong> First Name : </strong> Only letters and white space allowed<br>";
    }
    if (!preg_match("/^[a-zA-Z-' ]{3,31}$/", $_POST['last_name'])) {
        $getOK = false;
        $info .= "<strong> Last Name : </strong> Only letters and white space allowed<br>";
    }
    if (!preg_match("/^[0-9]{11}$/", $_POST['phone_number'])) {
        $getOK = false;
        $info .= "<strong> Phone Number : </strong> Only 11 digit are allowed<br>";
    }
    if (!preg_match('/^[a-zA-Z0-9@#$%^&*]{6,30}$/', $_POST['password'])) {
        $getOK = false;
        $info .= "<strong> Password : </strong>Use character, number and minimum length 6<br>";
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $getOK = false;
        $info .= "<strong> Email : </strong>Enter a valid Email <br>";
    }
    if (!$getOK) {
    }
    return $getOK;
}
if (!empty($save)) {
    //echo "<script>alert('button is cliked')</script>";
    if (getOK()) {

        if ($con) {
            $info = "succcesfully connnected";
        } else {
            $info = "not connected";
        }
        if (isHasTable($con, "user")) {
            $info = "Table already exist";
        } else {
            $info = "table not exists";
            if (createUserTable($con)) {
                $info = "User table created";
            } else {
                $info = "User table not created";
            }
        }
        $sql = "SELECT * FROM user where phone_number, email = '$phone_number' OR '$email'";
        $result = mysqli_query($con,  $sql);
        $r = mysqli_num_rows($result);

        if ($r < 1) {
            $info = "No Data table";
            $insert =  "INSERT INTO user (first_name,last_name,phone_number,email,password)
             VALUES ('$first_name','$last_name','$phone_number','$email',$password)";
            $c = mysqli_query($con, $insert);
            if ($c) {
                $info = "Registration succesfull";
            } else {
                $info = "error";
            }
        } else {
            $info = "email already exist";
        }
    }
} else {
    $info .= "error";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>


    <div class="card">
        <div class="h">
            <h1>
                Create a Account
            </h1>
            <!-- <p>
                <?php
                echo "Info " . $info;
                ?>
            </p> -->
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-field">
                <input type="text" name="first_name" placeholder="First name"><br>
            </div>
            <div class="form-field userform-field">
                <input type="text" name="last_name" placeholder="Last name"><br>
            </div>
            <div class="form-field">
                <input type="text" name="phone_number" placeholder="Phone number"><br>
            </div>
            <div class="form-field">
                <input type="text" name="email" placeholder="Email"><br>
            </div>
            <div class="form-field">
                <input type="text" name="password" placeholder="Password"><br>
            </div>
            <div class="form-field">
                <input type="text" name="confirm_password" id="" placeholder="Confirm password"><br>
            </div>
            <!-- <div style="display: inline;color: rgb(241, 224, 224);padding-top: 3px;">
                <div style="float: left;">
                    <input type="checkbox" name="reminder" value="C">
                <label for="reminder">Remember me</label>
                </div>
                <span style="float: right;">
                    <a href="#">Forgot password</a>
                </span>
            </div> -->
            <input type="submit" name="save" id="" value="Signup">
            <p style="color: rgb(18, 53, 10);"> <b>Already have an account? </b> <a href="login.html">Login</a>
            </p>
        </form>
    </div>
</body>

</html>