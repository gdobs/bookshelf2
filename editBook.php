<?php
/**
 * edit book is designed to edit a book thats already in the database
 */
    session_start();
    require('db.php');

    //call edit book then redirect using php and javascript
    if(isset($_POST['submit'])){
           echo $_SESSION['id'];
           editBook($_POST['title'],$_POST['fiction'],$_POST['publisher'],$_POST['summary'],$_POST['pages'],$_SESSION['id']);
           echo '<script type="text/javascript">';
           echo 'window.location = "viewBooks.php";';
           echo '</script>';
   }

   //get book data for populating the form
   $connection = getConnection();
   if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $_SESSION['id'] = $id;
     //$books = getBooks();
     //$book = $books[$id-1];
     $book = getBook($id);
     $book = $book[0];
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
<form action="editBook.php" method="post">
    <!-- book title -->
    <div class="col-sm-10">
        <label class="col-form-label" for="title">Title</label>
        <input type="text" class="form-control" name="title" value="<?=$book['title']?>">
    </div>
    
    <!-- fiction or not? -->
    <div class="col-sm-10">
        <div class="custom-radio">
            <label for="fiction">Fiction</label>
            <input  type="radio" name="fiction" checked="<? if($book['fiction'] == 1){echo 'checked';}?>"> Yes 
            <input type="radio" name="fiction" checked="<? if($book['fiction'] == 0){echo 'checked';}?>"> No
        </div>
    </div>
    
    <!-- publisher -->
    <div class="col-sm-10">
        <label for="publisher">Publisher</label>
        <select class="form-control" name="publisher">
            <option><?=$book['publisher']?></option>
            <option>Harper Collins</option>
            <option>Pearson</option>
            <option>Scholastic Press</option>
            <option>Penguin Classics</option>
            <option>Bantam</option>
            <option>Delacorte Press</option>
        </select>
    </div>
    
    
    <!-- summary -->
    <div class="col-sm-10">
        <label for="summary" >Summary</label>
        <textarea class="form-control" rows="7" name="summary"><?=$book['summary']?></textarea>
    </div>
    
    <!-- # of pages -->
    <div class="col-sm-10">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" name="pages" value="<?=$book['pages']?>">
    </div>
    
    <!-- submit the form -->
    <div class="col-sm-10">
        <input class="btn btn-primary" style="margin-left:40%;" type="submit" name="submit"value="Save Changes!">
    </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>