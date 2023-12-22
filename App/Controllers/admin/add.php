<?php
use App\Controllers\admin\BookController;


if(isset($_POST['submit'])){
  require_once '../../../vendor/autoload.php';

  //  titre	author	genre	description	publication_year	total_copies	variable_copies
    $titre = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $genre = htmlspecialchars($_POST['genre']);
    $description = htmlspecialchars($_POST['description']);
    $publication_year = htmlspecialchars($_POST['publicationYear']);
    $total_copies = htmlspecialchars($_POST['totalCopies']);
    

    session_start();

    session_unset();

    $set_book = new BookController();
    
    $set_book->createBook($titre,$author,$genre,$description,$publication_year,$total_copies);

}

?>