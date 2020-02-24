
<?php
include("../DB/DBManager.php");
if(isset($_POST["submit"])) {

  $name =$_POST['name'];
    $img =$_FILES['fileToUpload']['name'];
    $image = $_FILES['fileToUpload']['tmp_name'];



   echo insertImage($name,$img,$image);
/*    if(insertImage($name,$img,$image)==false){
        $_SESSION["msgUpload"]="LE NOM EXISTE DEJA";
        header("location:../views/Promotion.php");
    }else{

        $_SESSION["msgUpload"]="L'image a ete ajoute";
        header("location:../views/Promotion.php");
    }*/




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

