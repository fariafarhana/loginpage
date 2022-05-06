<?php
include 'config.php';
$email ="mail@gmail.com";
$first_name = "data";
$last_name= "lastname";
$password = "password";
$phone_number= "12345678901";

$info = "";
function isValid(){
    $getOK = true;
    $info = "";
    $email ="mail@gmail.com";
$first_name = "data";
$last_name= "lastname";
$password = "password";
$phone_number= "12345901";
    if (!preg_match("/^[a-zA-Z-' ]{3,31}$/", $first_name)) {
        $getOK = false;
        $info .= "<strong> First Name : </strong> Only letters and white space allowed<br>";
    }
    if (!preg_match("/^[a-zA-Z-' ]{3,31}$/", $last_name)) {
        $getOK = false;
        $info .= "<strong> Last Name : </strong> Only letters and white space allowed<br>";
    }
    if (!preg_match("/^[0-9]{11}$/", $phone_number)) {
        $getOK = false;
        $info .= "<strong> Phone Number : </strong> Only 11 digit are allowed<br>";
    }
    if (!preg_match('/^[a-zA-Z0-9@#$%^&*]{6,30}$/', $password)) {
        $getOK = false;
        $info .= "<strong> Password : </strong>Use character, number and minimum length 6<br>";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $getOK = false;
        $info .= "<strong> Email : </strong>Enter a valid Email <br>";
    }
    return $getOK;
}
if (isValid()){
    echo "Valid <br>";
}else{
    echo"not";
}
echo "Info  " .$info;
// if($con){
    
//     echo "connected <br>" ;
// }else{
//     echo "not connected";
// }
// if (isHasTable($con, "user")) {
//    echo "Table already exist <br>";
// } else {
//     echo "table not exists";
//     if(createUserTable($con)){
//         echo "User table created";
//     }
//     else{
//       echo "User table not created";
//     }
// }
// $sql = "SELECT * FROM user";
// $result = mysqli_query($con,  $sql);
// $r = mysqli_num_rows($result) ;
// if($r>0){
//     //echo "raw exist :" .$r;
//     while($row_array= mysqli_fetch_assoc($result)){
     
//         $first_name = $row_array['first_name'];
//         $email = $row_array['email'];


//     }
// }



// if ($r < 1 ) {
//     echo "No Data table <br>";
//     $insert =  "INSERT INTO user (first_name,last_name,phone_number,email,password)
//      VALUES ('$first_name','$last_name','$phone_number','$email',$password)";
//      $c=mysqli_query($con,$insert);
//      if($c){
//       echo "Registration succesfull";
//      }else{
//          echo " registration failed";
//      }
// }else{
//     echo "email already exist";
// }

?>