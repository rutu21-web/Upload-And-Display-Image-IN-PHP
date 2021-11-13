<?php

include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>How to Upload an Image In PHP & Mysql</h1>
    <div class="myform">
        <form method="post" enctype="multipart/form-data">
       <div class="input-field">
        <label>Your Name</label>
        <input type="text" name="username">
       </div>
       <div class="input-field">
           <label>Select an image</label>
           <input type="file" name="profile">
       </div>
       <div class="submit-btn">
      <button type="submit" name="upload">UPLOAD</button>
       </div>
        </form>
    </div>

 <?php

if(isset($_POST['upload']))
 {
    $img_loc=$_FILES['profile']['tmp_name'];
    $img_name=$_FILES['profile']['name'];
    $uname=$_POST['username'];
    $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
     
    $img_size=$_FILES['profile']['size']/(1024*1024);

    $img_des="Uploaded Images/".$uname.".".$img_ext;

    //move_uploaded_file($img_loc,"Uploaded Images/".$uname.".".$img_ext);
     
    if(($img_ext!='jpg') && ($img_ext!='png') && ($img_ext!='jpeg') && ($img_ext!='webp'))
     {
         echo "<script>alert('Invalid Image Extension')</script>";
         exit(); //Code will stop and wont execute further
     }
    
    if($img_size>4)
     {
         echo "<script>alert('Image size too large')</script>";
         exit(); //Code will stop and wont execute further
     } 

    $query="INSERT INTO `user_data`(`Username`, `Profile`) VALUES('$uname','$img_des')";

    $result=mysqli_query($conn,$query);
    
    if($result){
        move_uploaded_file($img_loc,$img_des);
        echo "<script>alert('Image Uploaded Successfully');
        window.location='display.php';
        </script>";
        
    }else
    {
        echo "<script>alert('Failed to Upload Image')</script>";
    }
      
 }

?> 


</body>
</html>