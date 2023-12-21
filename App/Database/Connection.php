<?php
namespace App\Database;


//require __DIR__ . '/../../vendor/autoload.php';
use PDO, PDOException, Exception;
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// final 
class Connection{
    private static $instance;
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    private $conn;
    
    private function __construct(){
        $this->servername = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->connntion();    
    }

    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConn(){
        return $this->conn;
    }
    
    private function connntion(){

        try {
            $this->conn =  new PDO("mysql:host = $this->servername;dbname=$this->dbname", $this->username, $this->password);            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 

        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }       
        return $this->conn;
    }
}

/* $connection= Connection::getInstance();

if($connection->getConn()){
    echo 'good';
}else echo 'bad';
*/
?> 
