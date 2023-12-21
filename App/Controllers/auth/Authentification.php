<?php

namespace App\Controllers\auth;
use App\Models\Users;


class Authentification {

    private $objetUser;

    public function __construct(){
        $this -> objetUser = new Users();
    }

    public function registration($firstName,$lastName,$email,$password,$phone) {
       
        $deuplicate = $this -> objetUser->select_user($email);

        $_SESSION ['firstName'] = $firstName ;
        $_SESSION ['lastName'] = $lastName ;
        $_SESSION ['email'] = $email ;
        $_SESSION ['password'] = $password ;
        $_SESSION ['phone'] = $phone ;

        if($deuplicate) { // user username or email is already taken
            echo 'email is already taken';
            $_SESSION ['error_user'] = 'Email is already taken';

            header('Location:http://localhost/sprint3_brief2/views/auth/register.php');
        }

        else {
            echo 'register is currently';

            $insert_user = $this -> objetUser -> add_user($firstName, $lastName, $email, $password,$phone);

           if($insert_user) {
            
           echo 'Votre compte a été crée avec succés';
           header('Location:http://localhost/sprint3_brief2/views/auth/login.php');
            } else {
                     echo 'Erreur de connexion: ';
                }
    }

        }
////////////////////////////////////////////////////////////////functions 2//////////////////////////////////////////////////////////////////////////////////////////

        public function login($Username,$passwords){
            
            $Username_error = '' ;
            $passwords_error = '' ;

            if(empty($Username)) {
                $Username_error = 'Your email is required';
            }
            
            if(empty($passwords)) {
                $passwords_error = 'Password is required';
            }
            
            if(empty($Username_error) && empty($passwords_error)) {

                $result = $this -> objetUser->select_user2($Username);//function user

                if(!$result) {
                     
                    $Username_error = 'This username does not exist';

                } else if($passwords !=$result['password']) {
                    
                        $passwords_error = 'The password is incorrect';
                    }
        
                    if(!empty($Username_error) || !empty($passwords_error)){
                        $_SESSION["Username_error"] = $Username_error ;
                        $_SESSION["passwords_error"] = $passwords_error ;
            
                        $_SESSION["Username"] = $Username ;
                        $_SESSION["passwords"] = $passwords ;
                        header('Location:http://localhost/sprint3_brief2/views/auth/login.php');
                       
                    }
                    
                    else {
                       
                        $_SESSION["Username"] = $Username ;
                        $_SESSION["passwords"] = $passwords ;
                        $_SESSION["role_name"] = $result['name'] ;
                        //$fullname = $result['first_name'] +' '+ $result['last_name'];
                        $_SESSION["first_name"]  = $result['first_name'];//!!!!
                        $_SESSION["last_name"]  = $result['last_name'];
        
                        if($result['name'] == 'Administrateur'){
                            header('Location:http://localhost/sprint3_brief2/views/admin/dashboard.php');
                            
                        } else if($result['name'] == 'Utilisateur'){
                            header('Location:http://localhost/sprint3_brief2/views/user/home.php');
                           
                        } 
                    
                }
            }
        }

        
    }




 
?>