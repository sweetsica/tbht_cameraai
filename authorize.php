<?php

// Thiết lập client ID và client secret được cung cấp bởi máy chủ OAuth
$client_id = '279c0b6a827ddccfce4ae52cf80b5e1b';
$client_secret = 'c9ad30718c388f1a809e05800f799954';

// Thiết lập URI chuyển hướng sau khi người dùng đã cấp quyền truy cập
$redirect_uri = 'http://huma_new.test:8081/dist';

// Thiết lập điểm cuối máy chủ OAuth để yêu cầu mã truy cập
$token_endpoint = 'https://oauth.hanet.com/oauth2/token';

// Thiết lập điểm cuối máy chủ OAuth để bắt đầu luồng xác thực
$auth_endpoint = 'https://oauth.hanet.com/oauth2/authorize';

// Kiểm tra xem mã xác thực đã có sẵn chưa
if (isset($_GET['code'])) {
    // Người dùng đã cấp quyền truy cập cho ứng dụng, vì vậy trao đổi mã xác thực để nhận mã truy cập
    $authorization_code = $_GET['code'];

    // Tạo yêu cầu cURL đến điểm cuối mã truy cập
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

    // Phân tích cú pháp JSON phản hồi và trích xuất mã truy cập
    $token_data = json_decode($response, true);
    $access_token = $token_data['access_token'];
    // session_start();
    // $_SESSION['access_token1']=$access_token;
    // TODO: Lưu mã truy cập để sử dụng cho các yêu cầu API sau này

    // Chuyển hướng người dùng đến trang thành công
    header('Location: index.php');
    exit();
} else {
    // Người dùng chưa cấp quyền truy cập cho ứng dụng, vì vậy bắt đầu luồng xác thực bằng cách chuyển hướng người dùng đến trang xác thực với các tham số truy vấn thích hợp
    $auth_url = $auth_endpoint . '?response_type=code&client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&scope=full';

    // Chuyển hướng người dùng đến trang xác thực
    header('Location: ' . $auth_url);
    exit();
}
