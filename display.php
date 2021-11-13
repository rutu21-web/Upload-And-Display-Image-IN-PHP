<?php

include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Image In PHP</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <h1>Fetching image Using PHP and Mysql</h1>
    <div class="data">
        <button id="btn"><a href="upload.php">Go Back</a></button>
        <table>
            <thead>
                <th>Serial No</th>
                <th>Name</th>
                <th>Profile</th>
            </thead>
            <tbody>
           <?php
          
          $query="SELECT * FROM `user_data`";
          $result=mysqli_query($conn,$query);
          while($row=mysqli_fetch_assoc($result))
              {
                  echo"
                   <tr>
                  <td>$row[Serial_no]</td>
                  <td>$row[Username]</td>
                  <td><img src='$row[Profile]' width='150px'></td>
                   </tr>
                  ";
              }
            ?>    
            </tbody>
        </table>
    </div>
</body>
</html>