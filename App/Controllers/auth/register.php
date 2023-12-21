<?php

//include __DIR__ . '/Authentification.php'; 
                
use App\Controllers\auth\Authentification;  
require_once '../../../vendor/autoload.php'; 

if(isset($_POST)){

    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $phone = htmlspecialchars($_POST['phone']);
    

    session_start();

    session_unset();

    $set_user = new Authentification();
    
    $set_user->registration($firstName,$lastName,$email,$password,$phone);

}  
    
?>

