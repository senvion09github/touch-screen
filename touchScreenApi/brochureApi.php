<?php
include 'config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get JSON input from the request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Check if the input is an array
    if (!is_array($data)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
        exit;
    }

    // Prepare the SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO view_brochure (name, email, mobile, product, status, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Default status value and current date/time
    $status = 1; 
    $created_at = date('Y-m-d H:i:s');

    // Initialize an array to collect inserted IDs or error messages
    $response = ['status' => 'success', 'inserted_ids' => [], 'errors' => []];

    // Iterate over each record in the data array
    foreach ($data as $record) {
        // Extract individual fields with default empty values
        $name = $record['name'] ?? '';
        $email = $record['email'] ?? '';
        $mobile = $record['mobile'] ?? '';
        $product = $record['product'] ?? '';
        $message = $record['message'] ?? '';

        // Bind the parameters and execute the statement
        $stmt->bind_param("ssssis", $name, $email, $mobile, $product, $status, $created_at);
        
        if ($stmt->execute()) {
            // Collect the ID of each inserted record
            $response['inserted_ids'][] = $stmt->insert_id;
        } else {
            // Collect any errors encountered during the insert operation
            $response['errors'][] = ['name' => $name, 'email' => $email, 'error' => $stmt->error];
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Send the JSON response with inserted IDs and any errors
    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
