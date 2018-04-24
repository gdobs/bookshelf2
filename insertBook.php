<?php
/**
 * Inserts new books into the database
 * @Author Geoff Dobson
 */
    require('db.php');

    //if all the fields have input, insert it into the database
    $goodInput = 0;
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $goodInput++;
    }
    else{
    }
    if (isset($_POST['fiction'])) {
        $fiction = $_POST['fiction'];
        if($fiction == 'on')
        {
            $fiction = 1;
        }
        else
        {
            $fiction = 0;
        }
        $goodInput++;
    }
    else{
    }
    if (isset($_POST['publisher'])) {
        $publisher = $_POST['publisher'];
        $goodInput++;
    }
    else{
        
    }
    if (isset($_POST['summary'])) {
        $summary = $_POST['summary'];
        $summary = trim($summary);
        $goodInput++;
    }
    else{
      
    }
    if (isset($_POST['pages'])) {
        $pages = $_POST['pages'];
        $goodInput++;
    }
    else{
        
    }
    
    if($goodInput >= 5){
        $return = insertBook($title,$fiction,$publisher,$summary,$pages);
        if($return == 1){
            echo '<div class="alert alert-success" role="alert">
  Success! New Book inserted!
</div>';
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
  Error! Book not inserted.
</div>';
        }
    }
    else if(isset($_POST['submit'])){
            echo '<div class="alert alert-danger" role="alert">
  Error! Book not inserted.
</div>';
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
<form action="insertBook.php" method="post">
    <!-- book title -->
    <div class="col-sm-10">
        <label class="col-form-label" for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    
    <!-- fiction or not? -->
    <div class="col-sm-10">
        <div class="custom-radio">
            <label for="fiction">Fiction</label>
            <input  type="radio" name="fiction"> Yes 
            <input type="radio" name="fiction"> No
        </div>
    </div>
    
    <!-- publisher -->
    <div class="col-sm-10">
        <label for="publisher">Publisher</label>
        <select class="form-control" name="publisher">
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
        <textarea class="form-control" rows="7" name="summary"></textarea>
    </div>
    
    <!-- # of pages -->
    <div class="col-sm-10">
        <label for="pages">Pages</label>
        <input type="text" class="form-control" name="pages" placeholder="546">
    </div>
    
    <!-- submit the form -->
    <div class="col-sm-10">
        <input class="btn btn-primary" style="margin-left:40%;" type="submit" value="Add!" name="submit">
    </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>