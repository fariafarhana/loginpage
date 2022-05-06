<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "test";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
} else {
    // echo "<script>alert('Connected')</script>" ;  
}
function isHasTable($con, $table_)
{
    $c = false;
    $database = "test";
    $showtables = mysqli_query($con, "SHOW TABLES FROM $database");
    while ($table = mysqli_fetch_array($showtables)) {
        //echo($table[0] . "<br>");//Printing Table
        if ($table[0] == $table_) {
            $c = true;
        }
    }
    return $c;
}
function createUserTable($con)
{
    $isCreated = false;
    $sqli = "CREATE TABLE user(    
        id int (8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        phone_number int(11) NOT NULL,
        email VARCHAR(50),
        user_password VARCHAR(100),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    if (mysqli_query($con, $sqli)) {
        //echo "Table user created successfully";
        $isCreated = true;
    } else {
        //echo "Error creating table: " . mysqli_error($con);

    }
    return $isCreated;
}
