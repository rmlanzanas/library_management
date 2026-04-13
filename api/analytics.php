<?php
include 'db.php';

// Tell Postman to expect JSON
header('Content-Type: application/json');

$type = $_GET['type'] ?? 'none';

if ($type == 'total_books') {
    $query = "SELECT COUNT(*) as total FROM books";
    $result = pg_query($conn, $query);
    $data = pg_fetch_assoc($result);
    echo json_encode(["success" => true, "total_books" => $data['total']]);

} elseif ($type == 'books_per_category') {
    $query = "SELECT c.name, COUNT(b.id) as book_count 
              FROM categories c 
              LEFT JOIN books b ON c.id = b.category_id 
              GROUP BY c.name";
    $result = pg_query($conn, $query);
    $data = pg_fetch_all($result);
    echo json_encode(["success" => true, "data" => $data ? $data : []]);

} elseif ($type == 'top_author') {
    $query = "SELECT a.name, COUNT(b.id) as book_count 
              FROM authors a 
              JOIN books b ON a.id = b.author_id 
              GROUP BY a.name 
              ORDER BY book_count DESC LIMIT 1";
    $result = pg_query($conn, $query);
    $data = pg_fetch_assoc($result);
    echo json_encode(["success" => true, "top_author" => $data ? $data : "No authors found"]);

} else {
    // If you don't provide a type, or type is wrong, show this:
    echo json_encode([
        "success" => false, 
        "message" => "Invalid or missing type. Use: total_books, books_per_category, or top_author",
        "received_type" => $type
    ]);
}
?>