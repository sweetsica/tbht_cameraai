<?php
session_start();

// Khai báo thông tin ứng dụng OAuth2
$client_id = 'your-client-id';
$client_secret = 'your-client-secret';
$redirect_uri = 'http://your-redirect-uri';
$scopes = 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';

// Xử lý đăng nhập OAuth2
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $url = 'https://www.googleapis.com/oauth2/v4/token';
    $params = array(
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response, true);

    // Lấy thông tin người dùng
    $url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $response['access_token'];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $user = json_decode(curl_exec($curl), true);
    curl_close($curl);

    // Lưu thông tin người dùng vào session
    $_SESSION['user'] = $user;
    header('Location: http://your-app-homepage');
    exit();
} else {
    // Chuyển hướng đến trang đăng nhập OAuth2 của Google
    $url = 'https://accounts.google.com/o/oauth2/auth?client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&scope=' . urlencode($scopes) . '&response_type=code';
    header('Location: ' . $url);
    exit();
}
?>
