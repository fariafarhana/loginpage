<?php
session_start();
include 'config.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$save = $_POST['save'];
$info = "";
$_SESSION['errorMessage']="";
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
    if (!preg_match("/^[0-9]{11}$/", $_POST['phone_number'] )) {
        $getOK = false;
        $info .= "<strong> Phone Number : </strong> Only 11 digit are allowed<br>";
    }
    if (!preg_match('/^[a-zA-Z0-9!@#$%^&*]{6,16}$/', $_POST['confirm_password'])) {
       $getOK = false;
        $info.= "<strong> Password : </strong>Use character, number and minimum length 6<br> Password".$_POST['confirm_password'];
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $getOK = false;
        $info .= "<strong> Email : </strong>Enter a valid Email <br>";
    }
    if (!$getOK) {
        $_SESSION['errorMessage']= $info;
    }
    return $getOK;
}
    if (!empty($save)) {
    //echo "<script>alert('button is cliked')</script>";
    if (getOK()) {
        if ($con) { 
             $_SESSION['errorMessage'] = "succcesfully connnected";
        } else {
            $_SESSION['errorMessage'] = "not connected";
            }
        if (isHasTable($con, "user")) {
            $_SESSION['errorMessage'] = "Table already exist";
        } else {
            $_SESSION['errorMessage'] = "table not exists";
            if (createUserTable($con)) {
                $_SESSION['errorMessage'] = "User table created";
            } else {
                $_SESSION['errorMessage'] = "User table not created";
            }
        }
            $sql = "SELECT * FROM user where email = '$email' OR phone_number = '$phone_number'";
            $result = mysqli_query($con,  $sql);
            $r = mysqli_num_rows($result);
        
        if ($r < 1) {
            $_SESSION['errorMessage'] = "No Data table";
            $insert =  "INSERT INTO user (first_name, last_name, phone_number, email, user_password)
             VALUES ('$first_name','$last_name','$phone_number','$email','$password')";
            $c = mysqli_query($con, $insert);
            if ($c) {
                $_SESSION['errorMessage'] = "Registration succesfull";
                header("location:login.php");
                die;
            } else {
                $_SESSION['errorMessage'] = "Registration failed :". mysqli_error($con);
            }
        } else {
            $_SESSION['errorMessage'] = "email already exist";
        }        

    } else {
        $_SESSION['errorMessage'] .= "Data invalid";
    }
}
else{
    $_SESSION['errorMessage']= " save button empty".$save;
}

?>
<html>

<head>
    <link rel="stylesheet" href="style/reg.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body style="font-family: sans-serif;">
    <h1 style="text-align: center; padding: 10px;">New User Registration</h1>
    <!-- Error And Info Showing -->
    <div id="errorDiv" class="center success notes">
        <p style="padding-top: 10px; padding-bottom: 10px; font-size: 14px;" id="errorPara">
            <?php
            echo $_SESSION['errorMessage'];
            ?>
        </p>
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
        <button type="submit" name="save" id="" value = "Signup">
            Signup
        </button>
        <p style="color: rgb(18, 53, 10);"> <b>Already have an account? </b> <a href="login.html">Login</a>
        </p>
    </form>
</body>

</html>