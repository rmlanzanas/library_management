<?php
include 'db.php';

$title = $_POST['title'];
$author_id = $_POST['author_id'];
$category_id = $_POST['category_id'];

$sql = "INSERT INTO books(title,author_id,category_id)
VALUES('$title','$author_id','$category_id')";

if($conn->query($sql)){
    echo "Book Added";
}else{
    echo "Error";
}
?>