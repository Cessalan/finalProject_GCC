
<?php
include("../DB/DBManager.php");
if(isset($_POST["submit"])) {

  $name =$_POST['name'];
    $img =$_FILES['fileToUpload']['name'];
    $image = $_FILES['fileToUpload']['tmp_name'];


    echo $img."<BR>";
    echo $image."<BR>";

insertImage($name,$img,$image);
header("location:../views/Promotion.php?m=Votre nouvelle image a ete ajoute");


/*  $file = $_FILES['fileToUpload'];
    $file_name = $_FILES['fileToUpload']['name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_temp_loc = $_FILES['fileToUpload']['tmp_name'];
    $file_store = "..controllers/uploads/".$file_name;


   if(move_uploaded_file($file_temp_loc, $file_store))
   {
       echo " Files are Uploaded";
       print_r($file);
   }
   else {
       echo "Files arent uploaded";
   }*/
}

