<?php
include 'db.php';

$query = "SELECT 
books.title,
authors.name AS author,
categories.name AS category
FROM books
JOIN authors ON books.author_id = authors.id
JOIN categories ON books.category_id = categories.id";

$result = pg_query($conn, $query);

$data = [];

while($row = pg_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);

?>