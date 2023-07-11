<?php

require 'connection.php';

if(isset($_POST['submit'])){
    
    $new_img_name = $_POST["imgName"];
    
    $file_name = 'https://wallpaperaccess.com/full/6238547.jpg';
    $target_directory = "images/";
    
    $extension = '.jpg';
    $fileNameDirectory  = $target_directory.$new_img_name.$extension;
    
    $copied = copy($file_name, $fileNameDirectory);
    
    $res = mysqli_query($conn, "INSERT INTO `data`(old_img,new_img) VALUES('$file_name','$fileNameDirectory');");
    
    if($res==true && $copied==true){

        echo'<script>alert("successfully copied and added to database");</script>';

    }

}

?>

<html>
    <head>
        <title>Image Duplicate</title>
    </head>
    <body>
        <form method='POST' action='index.php' enctype="multipart/form-data">
            <input type="text" name="imgName" placeholder="Enter new image name" required>
            <input type='submit' value="submit" name="submit">
        </form>
    </body>
</html>