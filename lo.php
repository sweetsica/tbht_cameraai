<?php

// Set the username and password
$username = 'baonn@doppelherz.vn';
$password = 'admin@2023';
$client_id = '279c0b6a827ddccfce4ae52cf80b5e1b';
$redirect_uri = 'http://huma_new.test:8081/';

// Redirect the user to the OAuth2 authorization endpoint
$login_url = "https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=full";
// Set the login URL
// $login_url = 'https://yourapp.com/login';

// Create a new cURL resource
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $login_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$username&pwd=$password");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check the response for login success
if (strpos($response, 'Login successful') !== false) {
    echo 'User authenticated';
} else {
    echo 'Authentication failed';
}

// Close the cURL resource
curl_close($ch);

?>
