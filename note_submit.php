<?php

session_start();
if(!isset($_SESSION['user_id']))
{
    echo "You must be logged in to do that.";
}
 else {

   try{
   require_once 'includes/pdo_connect.php';
   
   
   $id=$_SESSION['user_id'];
   $title=filter_var($_POST['title'], FILTER_SANITIZE_STRING);  
   $content=$_POST['content'];
   $ts=time();
   $uniqueName=$id.'-'.$ts.'.txt';
   //na somym kuncu
    $fileName = "content/".$uniqueName;

    
    $stmt = $db->prepare("INSERT INTO notes(title,author,path) VALUES (:title,:id,:fileName)");

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':fileName', $fileName, PDO::PARAM_STR);

    $stmt->execute();
    
    $fileHandle = fopen($fileName, 'w');
    fwrite($fileHandle, $content);
    fclose($fileHandle);
    header('Location: index.php');
   }
   catch(Exception $e)
     {
       $message = 'Cannot process';
     }
}
?>
