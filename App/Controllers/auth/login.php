<?php

use App\Controllers\auth\Authentification;  
require_once '../../../vendor/autoload.php';

if(isset($_POST['submit'])) { 

    $Username = $_POST['email'];
    $passwords = $_POST['password'];

    session_start();
    session_unset();

    $set_user = new Authentification();
    
    $set_user->login($Username,$passwords);

}

?>