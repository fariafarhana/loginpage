

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body class="bg">
<?php
include 'config.php';
error_reporting(0);
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $save=$_POST['save'];
    $info=" ";

  if(!empty($save)){
      echo "<script>alert('button is cliked')</script>";

  }
 
  if($con){
      $info = "succcesfully connnected";
  }else{
      $info= "not connected";
  }
?>

    <div>

    </div>
    <div class="card">
        <div class="h">
            <h1>
                Create a Account
            </h1>
            <p>
                <?php
                echo "Info " .$info;
                ?>
            </p>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
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