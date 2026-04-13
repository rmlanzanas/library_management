<?php
include 'db.php';

// Postman key remains 'category_name' for clarity, but DB uses 'name'
$category_name = $_POST['category_name'] ?? null;

if ($category_name) {
    // UPDATED: Using 'name' for the column and 'id' for the return
    $query = "INSERT INTO categories (name) VALUES ($1) RETURNING id";
    $result = pg_query_params($conn, $query, array($category_name));

    if ($result) {
        $row = pg_fetch_assoc($result);
        echo json_encode([
            "success" => true,
            "category_id" => $row['id'], // We return it as category_id for your API
            "message" => "Category created!"
        ]);
    } else {
        echo json_encode(["success" => false, "error" => pg_last_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "category_name is required"]);
}
?>