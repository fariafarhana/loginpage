<?php
include 'config.php';
include 'myfunction.php';
if (isset($_POST['button'])) {
  $product_name = $_POST['productname'];
  $description = $_POST['comment'];
  $price = $_POST['price'];
  $buying_price = $_POST['regularprice'];
  $discount = $_POST['discount'];
  $category = $_POST['category'];

  $tempPath = $_FILES["picture"]["tmp_name"];
  $fileName = $_FILES["picture"]["name"];
  $fileSize = $_FILES["picture"]["size"];
  $extention = pathinfo($fileName, PATHINFO_EXTENSION);
  $target_folder = "assets/product_photo/";
  $newFile = $target_folder . $fileName;
  if ($fileName != "") {
    if (!file_exists($newFile)) {
      if ($extention == "jpg" || $extention == "png") {
      
        $c =move_uploaded_file($tempPath, $newFile);
        if(!$c){
         echo"faild";
        }
        else{
           if(isHasTable($conn,"product")==false){
             echo "creating table<br>";
            create_product_table($conn);

         }
         else {
          echo "inserting data<br>";
         $sql = "INSERT INTO product 
         (product_name,
         description,
         price,
         buying_price,
         discount,
         category,
         product_image)values 
         (
          '$product_name',
          '$description',
          '$price',
          '$buying_price',
          '$discount',
          '$category',
          '$fileName'
         )";
         $check = mysqli_query($conn,$sql);
         }
        }
      }
      
      else {
        echo "enter correct image";
      }
    } else {
      echo "File Already Exist";
    }
  } else {
    echo "Please, Select file First";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style/addp.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADD Product</title>
</head>
<body>
  <div class="card">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="productname" placeholder="Enter product Name " style="text-align: left;"><br>
      <!-- <input type="text" name="description" placeholder="Description" style="height: 100px; text-align: center;"><br> -->
      <textarea rows="4" cols="10" name="comment" placeholder="Describe yourself here...">
            </textarea><br>

      <div style="display: inline-flex;">
        <input type="number" name="price" placeholder="price">
        <input type="number" name="regularprice" placeholder="regular">
        <input type="number" name="discount" placeholder="discount">

      </div>
      <p>
      <h3 style="text-align:center; ">category</h3>
      <input type="text" name="category">
      </p>
            <p>
                <h2 style=" text-align: center; color: rgb(35, 54, 45);">Upload your Image</h2>
            </p>
            <input type="file" name="picture" id="">
            <!-- <input type="submit" name="button" value="upload"><br> -->
            <input type="submit" name="button" value="submit" class="submit">
            <a style="color: rgb(33, 41, 41);" href="index.html">Back to Homepage</a>
    </form>

  </div>
  <!-- <div>
    <?php
    $path = "assets/product_photo/b15.jpg";
    for ($x = 0; $x <= 5; $x++) {
      $mytitle = "heading " . $x;
    ?>
      <h1><?php echo "title=" . $mytitle ?></h1>
      <img style="width: 200px; height: 200px;" src=" <?php echo $path ?>" alt="">
    <?php
    }
    ?>
  </div> -->


</body>

</html>