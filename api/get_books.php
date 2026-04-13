<?php
include 'db.php';

$query = "SELECT * FROM books";

$result = pg_query($conn, $query);

$data = [];

while($row = pg_fetch_assoc($result)){
    $data[] = $row;
}

echo json_encode($data);

?>