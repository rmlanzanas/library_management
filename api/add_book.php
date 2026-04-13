<?php
include 'db.php';

$title = $_POST['title'] ?? null;
$author_id = $_POST['author_id'] ?? null;
$category_id = $_POST['category_id'] ?? null;

if ($title && $author_id && $category_id) {
    // We use the ID columns you verified earlier
    $query = "INSERT INTO books (title, author_id, category_id) VALUES ($1, $2, $3) RETURNING id";
    $result = pg_query_params($conn, $query, array($title, $author_id, $category_id));

    if ($result) {
        $row = pg_fetch_assoc($result);
        echo json_encode([
            "success" => true,
            "book_id" => $row['id'],
            "message" => "Book added!"
        ]);
    } else {
        echo json_encode(["success" => false, "error" => pg_last_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
}
?>