<?php
include 'db.php';

// The SQL Query that joins all three tables
$query = "SELECT 
            b.id AS book_id, 
            b.title, 
            a.name AS author_name, 
            c.name AS category_name
          FROM books b
          INNER JOIN authors a ON b.author_id = a.id
          INNER JOIN categories c ON b.category_id = c.id";

$result = pg_query($conn, $query);

if ($result) {
    $books = pg_fetch_all($result);
    echo json_encode([
        "success" => true,
        "data" => $books ? $books : [] // Returns empty list if no books exist
    ]);
} else {
    echo json_encode([
        "success" => false, 
        "error" => pg_last_error($conn)
    ]);
}
?>