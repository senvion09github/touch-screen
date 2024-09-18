<?php 
include 'config.php';

// Fetch data from the local database
$sql = "SELECT * FROM contact_us WHERE status = 0"; // Example query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Initialize an array to store all data
    $allData = [];

    // Iterate through the results and accumulate data
    while ($row = $result->fetch_assoc()) {
        $allData[] = [
            'id' => $row['id'], // Add ID to update the status later
            'name' => $row['name'],
            'email' => $row['email'],
            'countryCode' => $row['countryCode'],
            'mobile' => $row['mobile'],
            'company_name' => $row['company_name'],
            'message' => $row['message'],
            'status' => $row['status']
        ];
    }

    // Live server API URL
    $apiUrl = 'https://www.senvion.in/touchScreenApi/enquiryApi.php'; // Replace with your actual live server URL

    // Initialize cURL session
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // To capture the response
    curl_setopt($ch, CURLOPT_POST, true);           // To send data as POST
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'           // Set content type to JSON
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($allData)); // Convert data array to JSON format

    // Execute cURL request and capture the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // Print the response from the live server
        echo 'Response from server: ' . $response;
        
        // Assuming the response contains a success message or ID list, update status
        $updateStmt = $conn->prepare("UPDATE contact_us SET status = 1 WHERE id = ?");
        foreach ($allData as $data) {
            $updateStmt->bind_param("i", $data['id']);
            $updateStmt->execute();
        }
    }

    // Close cURL session
    curl_close($ch);

} else {
    echo "No data found in the Contact Us database.";
}

$sql = "SELECT * FROM view_brochure WHERE status = 0"; // Example query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Initialize an array to store all data
    $allData = [];

    // Iterate through the results and accumulate data
    while ($row = $result->fetch_assoc()) {
        $allData[] = [
            'id' => $row['id'], // Add ID to update the status later
            'name' => $row['name'],
            'email' => $row['email'],
            'countryCode' => $row['countryCode'],
            'mobile' => $row['mobile'],
            'product' => $row['product'],
            'status' => $row['status']
        ];
    }

    // Live server API URL
    $apiUrl = 'https://www.senvion.in/touchScreenApi/brochureApi.php'; // Replace with your actual live server URL

    // Initialize cURL session
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // To capture the response
    curl_setopt($ch, CURLOPT_POST, true);           // To send data as POST
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'           // Set content type to JSON
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($allData)); // Convert data array to JSON format

    // Execute cURL request and capture the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // Print the response from the live server
        echo 'Response from server: ' . $response;
        
        // Assuming the response contains a success message or ID list, update status
        $updateStmt = $conn->prepare("UPDATE view_brochure SET status = 1 WHERE id = ?");
        foreach ($allData as $data) {
            $updateStmt->bind_param("i", $data['id']);
            $updateStmt->execute();
        }
    }

    // Close cURL session
    curl_close($ch);

} else {
    echo "No data found in Brochure local database.";
}

// Close the local database connection
$conn->close();
?>
