<?php

 
 namespace App\Models;
 use App\Database\Connection;
 use PDO, PDOException, Exception;


class Users{
    
    private $conn;

    public function __construct(){

        $this->conn = Connection::getInstance()->getConn();
    }

    public function select_user($email) {
        
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function get_users(){
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $this->conn->prepare("SELECT users.*, roles.name
            FROM users
            JOIN user_role ON users.id = user_role.users_id
            JOIN roles ON user_role.roles_id = roles.id");
            $stmt->execute();
            //$result = $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        
    }
    public function add_user($firstName, $lastName, $email, $password , $phone) {
        try { 

            $insertion_user = $this->conn->prepare('INSERT INTO users (first_name, last_name, email, password, phone) VALUES (:firstName, :lastName, :email, :password, :phone)');      
            $insertion_user->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $insertion_user->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $insertion_user->bindParam(':email', $email, PDO::PARAM_STR);
            $insertion_user->bindParam(':password', $password, PDO::PARAM_STR);
            $insertion_user->bindValue(':phone', $phone, PDO::PARAM_STR); 

            $insertion_user->execute();   
            $LAST_ID = $this->conn->lastInsertId();
            $this->add_user_role($LAST_ID, 2);
            return $insertion_user;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        
    }


    public function select_user2($Username) {
        try {
            // Assuming $this->conn is a PDO connection
            //$stmt = $this->conn->prepare('SELECT * FROM users JOIN user_role on user.id = user_role.user_id WHERE email = :username');
            $stmt = $this->conn->prepare('SELECT users.*, roles.name
            FROM users
            JOIN user_role ON users.id = user_role.users_id
            JOIN roles ON user_role.roles_id = roles.id
            WHERE users.email = :email');

            $stmt->bindParam(':email', $Username, PDO::PARAM_STR);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            // Handle exceptions here
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // public function get_role($role){
    //     try {
    //         // Assuming $this->conn is a PDO connection
    //         $stmt = $this->conn->prepare('SELECT * FROM roles WHERE name = :roles');
    //         $stmt->bindParam(':roles', $role, PDO::PARAM_STR);
    //         $stmt->execute();
    
    //         $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //         return $row;
    //     } catch (PDOException $e) {
    //         // Handle exceptions here
    //         echo "Error: " . $e->getMessage();
    //         return false;
    //     }
    // }
    public function add_user_role($user_id, $role_id){
        try{
        $insertion_user_role = $this->conn->prepare('INSERT INTO user_role (users_id, roles_id) VALUES (:users_id, :roles_id)');      
        $insertion_user_role->bindParam(':users_id', $user_id, PDO::PARAM_STR);
        $insertion_user_role->bindParam(':roles_id', $role_id, PDO::PARAM_STR);

        $insertion_user_role->execute();   
            
        return $insertion_user_role;

    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }

    }

}

?>