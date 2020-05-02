<?php
if(isset($_POST['submit'])) 
{
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'svg');

    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize < 10000000)
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../medias/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header('Location: ../medias');
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
    else
    {
        echo "Vous ne pouvez pas mettre une image dans ce format";
    }
}