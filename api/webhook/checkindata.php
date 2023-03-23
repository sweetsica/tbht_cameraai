<?php

// Define a secret key that will be used to authenticate incoming webhook requests
$webhookSecretKey = 'your-secret-key';

// Verify that the request was sent with a valid secret key
if (!isset($_SERVER['HTTP_X_WEBHOOK_SECRET']) || $_SERVER['HTTP_X_WEBHOOK_SECRET'] !== $webhookSecretKey) {
  // If the secret key is invalid, return a 401 Unauthorized response and exit
  http_response_code(401);
  exit('Invalid secret key');
}

// Retrieve the data that was sent to the webhook endpoint
$postData = file_get_contents('php://input');

// Verify that the request contained data
if (empty($postData)) {
  // If the request did not contain data, return a 400 Bad Request response and exit
  http_response_code(400);
  exit('No data was sent');
}

// Parse the data that was received (assuming it was sent as JSON)
$jsonData = json_decode($postData);

// Verify that the data was successfully parsed
if (json_last_error() !== JSON_ERROR_NONE) {
  // If the data could not be parsed, return a 400 Bad Request response and exit
  http_response_code(400);
  exit('Invalid data format');
}

// Process the data as needed (in this example, we're just logging it to the console)
error_log(print_r($jsonData, true));

// Return a response to the webhook sender to indicate that the webhook was successfully received and processed
http_response_code(200);

?>
