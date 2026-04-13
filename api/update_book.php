<?php
include 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];

$query = "UPDATE books SET title='$title' WHERE id=$id";

$result = pg_query($conn, $query);

if($result){
    echo "Book Updated";
}else{
    echo "Error";
}

?>