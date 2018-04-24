<?php
/**
 * @author Geoff Dobson
 * @version 1
 */
    session_start();
    require('db.php');
    
   $connection = getConnection();
   if (isset($_GET['id'])) {
       //on get setup session
     $id = $_GET['id'];
     $book = getBook($id);
     $book = $book[0];
     $_SESSION['id'] = $id;
     $_SESSION['title'] = $book['title'];
     $_SESSION['publisher'] = $book['publisher'];
     $_SESSION['pages'] = $book['pages'];
     $_SESSION['summary'] = $book['summary'];
     $_SESSION['fiction'] = $book['fiction'];
     //delete book with id
     $result = deleteBook($id);
   }
   
   if(isset($_POST['submit'])){
       //reinsert the book if undo button is clicked
       insertBook( $_SESSION['title'], $_SESSION['fiction'], $_SESSION['publisher'],$_SESSION['summary'], $_SESSION['pages']);
       echo '<script type="text/javascript">';
       echo 'window.location = "viewBooks.php";';
       echo '</script>';
   }
?>
<html>
    <head>
        <title>Book Shelf</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    </head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="insertBook.php">Book Shelf</a>
  <a class="nav-link" href="viewBooks.php">View Books</a>
  <a class="nav-link" href="insertBook.php">Add Books</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>
  <form action="deleteBook.php" method="post">
  <div class="col-sm-10">
        <input class="btn btn-primary" style="margin-left:40%;" type="submit" name="submit" value="Undo Delete?">
</div>
</form>