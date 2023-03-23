<?php
// Setting up the client ID and Client Secret provided by the OAUTH2 server
$client_id = '279c0b6a827ddccfce4ae52cf80b5e1b';
$client_secret = 'c9ad30718c388f1a809e05800f799954';
$username = "baonn@doppelherz.vn";
$password = "admin@2023";
// Set up the URI to change after the user has granted access
$redirect_uri = 'http://huma_new.test:8081/view/code/';

// Set the end of the OAUTH2 server to request the access code
$token_endpoint = 'https://oauth.hanet.com/oauth2/token';

// Set the end of the OAUTH server to start the authentic flow
$auth_endpoint = 'https://oauth.hanet.com/oauth2/authorize';

// Check if the authentication code is already available
if (isset($_GET['code'])) {
    // Users have granted access to the application, so exchange authentication code to receive access codes
    $authorization_code = $_GET['code'];

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
            'code' => $authorization_code,
            'email'=>$username,
            'pwd'=>$password
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    // Analysis of JSON syntax responded and extracted access codes
    $token_data = json_decode($response, true);
    $access_token = $token_data['access_token'];
    // TODO: Lưu mã truy cập để sử dụng cho các yêu cầu API sau này

    //Switch users to the successful page
    header('Location: index.php');
    exit();
} else {
    // Users have not yet granted access to the application, so start the authentication flow by redirecting the user to the authentication page with the appropriate query parameters
    $auth_url = $auth_endpoint . '?response_type=code&client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&scope=full';
    echo "<script>sessionStorage.setItem('login', '1');</script>";
// var_dump($auth_url);
    // Shift user direction to authentication page
    header('Location: ' . $auth_url);
// Khởi tạo thư viện cURL
// include_once('auto.php');

// Thiết lập các tùy chọn của cURL


    // sleep(3);
    //         $curl1 = curl_init();

    //     // Thiết lập các tùy chọn của cURL
    //     curl_setopt_array($curl1, array(
    //     CURLOPT_URL => 'https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&state=',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     // Gửi yêu cầu HTTP để tải nội dung của trang đăng nhập
    //     $response1 = curl_exec($curl1);
    //     if ($response1) {
    //         // Tạo đối tượng DOM và tải nội dung đã tải về từ trang đăng nhập
    //         $dom = new DOMDocument();
    //         libxml_use_internal_errors(true);
    //         var_dump($dom);
    //     echo"
    //     <script>
    //     setTimeout(function() {
    //         document.querySelector('.btn.btn-primary.authorize-app.btn-block').click();
    //     }, 100); // sau 10 giây
        
    //     </script>
    //     ";
    // header('Location:'.'https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&state=');

    // var_dump($response);

// else {
//     // Handle errors when failed to load HTML content from the login page
//     // ...
//     echo "haizz";
// }

// Close cURL session
curl_close($curl);

    // include_once($auth_url);
    // var_dump($auth_url);
//
//
//
//
//
// Lấy thông tin từ URL
//
///
//
///
    exit();
}
//
//
//
//
// if (isset($_GET['code'])) {
//     // Người dùng đã cấp quyền truy cập cho ứng dụng, vì vậy trao đổi mã xác thực để nhận mã truy cập
//     $authorization_code = $_GET['code'];

//     // Tạo yêu cầu cURL đến điểm cuối mã truy cập
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => $token_endpoint,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => array(
//             'grant_type' => 'authorization_code',
//             'client_id' => $client_id,
//             'client_secret' => $client_secret,
//             'redirect_uri' => $redirect_uri,
//             'code' => $authorization_code
//         ),
//     ));
//     $response = curl_exec($curl);
//     curl_close($curl);

//     // Phân tích cú pháp JSON phản hồi và trích xuất mã truy cập
//     $token_data = json_decode($response, true);
//     $access_token = $token_data['access_token'];
//     // TODO: Lưu mã truy cập để sử dụng cho các yêu cầu API sau này

//     // Chuyển hướng người dùng đến trang thành công
//     header('Location: index.php');
//     exit();
// } else {
//     // Người dùng chưa cấp quyền truy cập cho ứng dụng, vì vậy bắt đầu luồng xác thực bằng cách chuyển hướng người dùng đến trang xác thực với các tham số truy vấn thích hợp
//     $auth_url = $auth_endpoint . '?response_type=code&client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&scope=full';
    
//     // Chuyển hướng người dùng đến trang xác thực
//     echo "<script>window.location.href = '$auth_url';</script>";
//     exit();
// }
