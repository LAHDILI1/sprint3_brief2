<?php

 
 namespace App\Models;
 use App\Database\Connection;
 use PDO, PDOException, Exception;


class Book{
    
    private $conn;

    public function __construct(){

        $this->conn = Connection::getInstance()->getConn();
    }

    public function get_book() {
        
        try {
            $result = $this->conn->query("SELECT * FROM book");
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function add_book($titre, $author, $genre, $description , $publication_year,$total_copies,$variable_copies) {
        try { 

            $insertion_book = $this->conn->prepare('INSERT INTO book (titre, author, genre, description, publication_year, total_copies, variable_copies) VALUES (:titre, :author, :genre, :description, :publication_year, :total_copies, :variable_copies)');      
            $insertion_book->bindParam(':titre', $titre, PDO::PARAM_STR);
            $insertion_book->bindParam(':author', $author, PDO::PARAM_STR);
            $insertion_book->bindParam(':genre', $genre, PDO::PARAM_STR);
            $insertion_book->bindParam(':description', $description, PDO::PARAM_STR);
            $insertion_book->bindValue(':publication_year', $publication_year, PDO::PARAM_STR); 
            $insertion_book->bindValue(':total_copies', $total_copies, PDO::PARAM_STR);
            $insertion_book->bindValue(':variable_copies', $variable_copies, PDO::PARAM_STR);

            $insertion_book->execute();   
        
            return $insertion_book;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        
    }

    public function delete_book($book_id){
        try { 

            $delete_book = $this->conn->prepare('DELETE FROM book WHERE id = :book_id');      
            $delete_book->bindParam(':book_id', $book_id, PDO::PARAM_STR);

            $delete_book->execute();      
            return $delete_book;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function update_book($book_id,$titre, $author, $genre, $description , $publication_year,$total_copies,$variable_copies){// suive //////  /////       /////// 
        try { 

            $update_book = $this->conn->prepare('update FROM book WHERE id = :book_id');      
            $update_book->bindParam(':book_id', $book_id, PDO::PARAM_STR);

            $update_book->execute();      
            return $update_book;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}

?>