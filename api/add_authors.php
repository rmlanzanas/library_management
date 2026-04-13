<?php
include 'db.php';

// Postman key: name
$name = $_POST['name'] ?? null;

if ($name) {
    // UPDATED: Using 'name' for the column and 'id' for the RETURNING clause
    $query = "INSERT INTO authors (name) VALUES ($1) RETURNING id";
    $result = pg_query_params($conn, $query, array($name));

    if ($result) {
        $row = pg_fetch_assoc($result);
        echo json_encode([
            "success" => true,
            "author_id" => $row['id'], // We return it as author_id for your frontend/Postman
            "message" => "Author added successfully!"
        ]);
    } else {
        echo json_encode(["success" => false, "error" => pg_last_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Name is required"]);
}
?>