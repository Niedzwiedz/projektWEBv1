<?php session_start();
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

//Connect to database from here
//select the database | Change the name of database from here

//get the posted values
$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$password=sha1($password);

    try
    {
        require_once 'includes/pdo_connect.php';

        /*** set the error mode to excptions ***/
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $db->prepare("SELECT user_id, username, password FROM bb_users 
                    WHERE username = :username AND password = :password");

        /*** bind the parameters ***/
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
       $user_id = $stmt->fetchColumn();

        if($user_id == false){
            echo "no";
        }
        else{
            echo "yes";
            $_SESSION['user_id']=$user_id;
        }
    }
    catch(Exception $e){
         $message='Cannot connect';
     }
   

