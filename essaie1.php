<?php
if(isset($_POST['submit'])) 
{
 $file = $_FILES['file'];
 
 $fileName = $_FILES['file']['name'];
 $fileTmpName = $_FILES['file']['tmp_name'];
 $fileSize = $_FILES['file']['size'];
 $fileError = $_FILES['file']['error'];
 $fileType = $_FILES['file']['type'];

 if($fileError === 0)
 {
 if($fileSize < 10000000)
 {
 $fileDestination = 'medias/'.$fileNameNew;
 move_uploaded_file($fileTmpName, $fileDestination);
 echo "Succès";
 }
 else
 {
 echo "Votre image est trop lourde";
 }
 }
 else
 {
 echo "Une erreur est survenue";
 }
}
