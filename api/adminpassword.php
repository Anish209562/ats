<?php 
include("../cpanel/db.php");

// Get the input data from the request
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

// Initialize response array
$ar1 = array();
$ar1['status'] = true;

// Execute the database query
$query = mysqli_query($host, "SELECT * FROM basic_setting");

if ($query && $row = mysqli_fetch_array($query)) {
    // Set the message to the WhatsApp value from the database
    $ar1['message'] = $row['whatsapp'];
} else {
    // Handle the case where the query fails or no data is found
    $ar1['status'] = false;
    $ar1['message'] = "Error fetching data from the database";
}

// Return the response as JSON
echo json_encode($ar1);
?>
