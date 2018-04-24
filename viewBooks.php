<?php
/**
 * @Author Geoff Dobson
 * view books gets a connection to the database then displays all the books in it
 */
require('db.php');


$connection = getConnection();
$books = getBooks();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="insertBook.php">Book Shelf</a>
  <a class="nav-link" href="viewBooks.php">View Books</a>
  <a class="nav-link" href="insertBook.php">Add Books</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>
</div>
 <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-group">
                    <?php
                    foreach ($books as $book) {
                        echo "<h3>{$book['title']}</h3><br>";
                        echo "Publisher: {$book['publisher']}, Pages: {$book['pages']}<br><br>";
                        echo "<p>{$book['summary']}</p><br><br>";
                        echo "<i class='far fa-edit'><a href='editBook.php?id=";
                        echo $book['id'];
                        echo "'>Edit</a></i>";
                        echo '<i class="far fa-trash-alt"><a href="deleteBook.php?id=';
                        echo $book['id'];
                        echo'">Delete</a></i>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
