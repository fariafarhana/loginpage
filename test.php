<?php
if(isset($_POST['submit'])){
//The path where orginal file will be temporary stored..which will required to move
$tempPath= $_FILES["productImage"]["tmp_name"];
echo "Temp Path : ".$tempPath."<br>";
//getting file name from input
$fileName= $_FILES["productImage"]["name"];
echo "File Name : ".$fileName."<br>";
//Getting file Size 
$fileSize= $_FILES["productImage"]["size"];
echo "File Size: ".$fileSize."<br>";
//Getting file extention
$extention = pathinfo($fileName, PATHINFO_EXTENSION);
echo "Extention : ".$extention."<br>";
//Move file to another folder
$target_folder = "product_photo/";
//Creating new file using file name and target folder
$newFile= $target_folder.$fileName;
//Before moving we should check if file selected
if($fileName!=""){
  //File selected...
  //Now make sure, file already not exist
  if (!file_exists($newFile)) {
    // file not exist... so we can move
    $c= move_uploaded_File ($tempPath, $newFile);
    if($c){
      echo "Saved";
    }else{
      echo "No saved";
    }
  }else{
    echo "File Already Exist";
  }
 
}
else {
  echo "Please, Select file First";
}


}
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  
  <input type="file" name="productImage">
  <br>
  <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>