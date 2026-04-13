<?php
include 'db.php';

// Set header to JSON so it matches your analytics.php output
header('Content-Type: application/json');

// Using $_GET makes it easy to test via the Params tab in Postman
$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode([
        "success" => false, 
        "message" => "Please provide a book ID in the params."
    ]);
    exit;
}

// SQL query to delete by ID
$query = "DELETE FROM books WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));

if ($result) {
    // Check if the ID actually existed and was deleted
    if (pg_affected_rows($result) > 0) {
        echo json_encode([
            "success" => true,
            "message" => "Book ID $id has been deleted."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "No book found with ID $id."
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "error" => pg_last_error($conn)
    ]);
}
?>