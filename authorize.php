<?php

// Setting up the client ID and Client Secret provided by the OAUTH2 server
$client_id = '279c0b6a827ddccfce4ae52cf80b5e1b';
$client_secret = 'c9ad30718c388f1a809e05800f799954';

// Set up the URI to change after the user has granted access
$redirect_uri = 'http://camai.doppelherz.vn/';

// Set the end of the OAUTH2 server to request the access code
$token_endpoint = 'https://oauth.hanet.com/oauth2/token';

// Set the end of the OAUTH server to start the authentic flow
$auth_endpoint = 'https://oauth.hanet.com/oauth2/authorize';

// Check if the authentication code is already available
if (isset($_COOKIE['code'])) {
    // Users have granted access to the application, so exchange authentication code to receive access codes
    $authorization_code = $_COOKIE['code'];

    // Create curl requirements to the end of the access code
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $token_endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'grant_type' => 'authorization_code',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'code' => $authorization_code
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    // Analysis of JSON syntax responded and extracted access codes
    $token_data = json_decode($response, true);
    $access_token = $token_data['access_token'];
    // session_start();
    // $_SESSION['access_token1']=$access_token;
    // TODO: Lưu mã truy cập để sử dụng cho các yêu cầu API sau này

    //Switch users to the successful page
    header('Location: index.php');
    exit();
} else {
    // Users have not yet granted access to the application, so start the authentication flow by redirecting the user to the authentication page with the appropriate query parameters
    $auth_url = $auth_endpoint . '?response_type=code&client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&scope=full';

    // Shift user direction to authentication page
    header('Location: ' . $auth_url);
    exit();
}
