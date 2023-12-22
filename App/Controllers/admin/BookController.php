<?php
namespace App\Controllers\admin;

use App\Models\Book;
//require_once '../../../vendor/autoload.php';

class BookController{
    private $objetBook;

    public function __construct(){
        $this -> objetBook = new Book();
    }

    public function createBook($titre,$author,$genre,$description,$publication_year,$total_copies) {
       
        $deuplicate = $this -> objetBook->select_book($titre);

        $_SESSION ['titre'] = $titre ;
        $_SESSION ['author'] = $author ;
        $_SESSION ['genre'] = $genre ;
        $_SESSION ['description'] = $description ;
        $_SESSION ['publication_year'] = $publication_year ;
        $_SESSION ['total_copies'] = $total_copies ;

        if($deuplicate) { // Book Bookname or email is already taken
            echo 'email is already taken';
            $_SESSION ['error_Book'] = 'Email is already taken';
            $deuplicate['variable_copies']++;
            $this -> objetBook ->update_book($deuplicate['book_id'],$deuplicate['titre'],$deuplicate['author'] ,$deuplicate['genre'], $deuplicate['description'], $deuplicate['publication_year'], $deuplicate['total_copies'],$deuplicate['variable_copies']);
            header('Location:http://localhost/sprint3_brief2/views/admin/PageBook.php');
        }

        else {
            echo 'register is currently';

            $insert_Book = $this -> objetBook ->add_book($titre, $author, $genre, $description , $publication_year,$total_copies);
            header('Location:http://localhost/sprint3_brief2/views/admin/PageBook.php');
           if($insert_Book) {
            
           echo 'Votre compte a été crée avec succés';
           header('Location:http://localhost/sprint3_brief2/views/admin/PageBook.php');
            } else {
                     echo 'Erreur de connexion: ';
                }
    }

        }
        public function get_all_books() {

            return $this->objetBook->get_book()->fetch();
            
        }
    public function show_Book(){
        $Book = $this -> objetBook->get_book();

        while($row = $Book->fetch()){
    
                        
                        echo '<tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['titre'] . '</td>
                                <td>' . $row['author'] . '</td>
                                <td>' . $row['publication_year'] . '</td>

                                <td>
                                    <a href="../../../App/Controllers/admin/Delete.php?BookId = $row[\'id\']" onclick="return confirm(\'Do you really want to remove this Book?\');">
                                        <button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                    </a>
                                    <button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
                                </td>
                            </tr>';

                        
        }
    }
    
}
 

?>