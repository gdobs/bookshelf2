<?php
/**
 * Created by PhpStorm.
 * User: Geoff
 * Date: 4/5/2018
 * Time: 7:32 PM
 */


    //get the connection
    function getConnection(){
        $usr = 'gdobsong_gdobsong';
        $pass = '*uC%@,4tu!S,';
        $host = 'localhost';
        $database = 'gdobsong_it328';

        $connection = mysqli_connect($host,$usr,$pass,$database);

        //var_dump($connection);
        return $connection;
    }

    //get array of all books in database
    function getBooks(){
        $connection = getConnection();

        $query = 'SELECT id,title,fiction,publisher,summary,pages FROM books';
        $results = mysqli_query($connection,$query);

        if(!$results){
            echo 'Error retrieving records.';
            exit;
        }

        while($row = mysqli_fetch_assoc($results)){
            $records[] = $row;
        }
        //free up server resources
        mysqli_free_result($results);

        return $records;
    }

    //get a single book from database from its id
    function getBook($id){
        $connection = getConnection();
        $query = "SELECT id,title,fiction,publisher,summary,pages FROM books WHERE id = '$id'";
        $results = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($results)){
            $records[] = $row;
        }
        //free up server resources
        mysqli_free_result($results);

        return $records;
    }

    //insert a book into the database
    function insertBook($title,$fiction,$publisher,$summary,$pages) {
        $connection = getConnection();
        $summary = mysqli_real_escape_string ( $connection , $summary);
        $query = "INSERT INTO books (title,fiction,publisher,summary,pages) VALUES ('$title','$fiction','$publisher','$summary','$pages')";
        return mysqli_query($connection, $query);
    }

    //edit a book already in the database
    function editBook($title,$fiction,$publisher,$summary,$pages,$id) {
        $connection = getConnection();
        $summary = mysqli_real_escape_string ( $connection , $summary);
        $query = "UPDATE books SET title = '$title', fiction = '$fiction', publisher = '$publisher', summary = '$summary', pages = '$pages' WHERE id='$id'";
        return mysqli_query($connection, $query);
    }

    //delete a book from the database based on id
    function deleteBook($id){
        $connection = getConnection();
        $query = "DELETE FROM books WHERE id = $id";
        return mysqli_query($connection, $query);
    }
    
?>