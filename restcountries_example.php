<?php

declare(strict_types=1);

// We get PHP command line parameters
if ($argc > 1) {
   $country = $argv[1];
} else {
    $country = "spain";
}

// Initialize a cURL session
$curl = curl_init();

// Set the cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => "https://restcountries.com/v3.1/name/$country", // API endpoint for Spain
    CURLOPT_RETURNTRANSFER => true,  // Return the response as a string
    CURLOPT_TIMEOUT => 30,           // Set a timeout for the request
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",  // Set the method to GET
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
]);

// Execute the cURL session and get the response
$response = curl_exec($curl);

// Check for any errors
$err = curl_error($curl);

// Close the cURL session
curl_close($curl);

// Process the response
if ($err) {
    echo "cURL Error #:".$err;
} else {
    // Print response in standard JSON
    echo $response;
}
