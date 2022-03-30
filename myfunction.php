<?php
function isHasTable($con,$table_){
    $c = false;
    $database = "fdb";
    $showtables= mysqli_query($con, "SHOW TABLES FROM $database");
    while($table = mysqli_fetch_array($showtables)) { 
     //echo($table[0] . "<br>");//Printing Table
     if($table[0]==$table_){
         $c= true;
     }
    }
    return $c;
}
 function create_product_table($conn){
    $sql = "CREATE TABLE product (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_name  TEXT NOT NULL,
        description TEXT NOT NULL,
        price float not null,
        buying_price float not null,
        discount float not null,
        category varchar(100) not null,
        product_image text not null,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $c= mysqli_query($conn, $sql);
        if(!$c){
            echo " product table not created";
        }
 }