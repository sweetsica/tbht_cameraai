<?php
// Thiết lập client ID và client secret được cung cấp bởi máy chủ OAuth
$client_id = '279c0b6a827ddccfce4ae52cf80b5e1b';
$client_secret = 'c9ad30718c388f1a809e05800f799954';
$username = "baonn@doppelherz.vn";
$password = "admin@2023";
// Thiết lập URI chuyển hướng sau khi người dùng đã cấp quyền truy cập
$redirect_uri = 'http://huma_new.test:8081/';

// Thiết lập điểm cuối máy chủ OAuth để yêu cầu mã truy cập
$token_endpoint = 'https://oauth.hanet.com/oauth2/token';

// Thiết lập điểm cuối máy chủ OAuth để bắt đầu luồng xác thực
$auth_endpoint = 'https://oauth.hanet.com/oauth2/authorize';

// Kiểm tra xem mã xác thực đã có sẵn chưa
$auth_url ='https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&state=';
    echo "<script>sessionStorage.setItem('login', '1');</script>";
var_dump($auth_url);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&state=',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HEADER=>true,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded',
  ),
  CURLOPT_POSTFIELDS => '',
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
));

// Gửi yêu cầu HTTP để tải nội dung của trang đăng nhập
$response = curl_exec($curl);
// echo $response;
if ($response) {
    // include('https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&scope=full');
    // Tạo đối tượng DOM và tải nội dung đã tải về từ trang đăng nhập
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($response);

    // // Tìm phần tử input email
    $emailInput = $dom->getElementById('email');

    // Nếu tìm thấy, đặt giá trị cho trường input
    if ($emailInput) {
        $emailInput->setAttribute('value', 'baonn@doppelherz.vn');
    }

    // // Find the password input element and set its value
    $passwordInput = $dom->getElementById('pwd');
    if ($passwordInput) {
        $passwordInput->setAttribute('value', 'admin@2023');
    }
    

    // Find the login button and dispatch a click event on it
    // Find the buttons with class "btn-primary"
    // echo"
    // <script>
    // setTimeout(function() {
    //     document.querySelector('.btn.btn-primary').click();
    //   }, 100); // sau 0.010 giây      
    // </script>
    // ";
    echo $dom->saveHTML();
    }
///
//
//
//
//
//
//
///
//
// Khởi tạo CURL
// $curl = curl_init();

// // Thiết lập URL cần lấy
// curl_setopt($curl, CURLOPT_URL, "https://oauth.hanet.com/oauth2/authorize?response_type=code&client_id=279c0b6a827ddccfce4ae52cf80b5e1b&redirect_uri=http%3A%2F%2Fhuma_new.test%3A8081%2Fdist%2F&scope=full");

// // Thiết lập để CURL trả về dữ liệu thay vì hiển thị nó
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// // Lấy nội dung của trang web
// $response = curl_exec($curl);

// // Khởi tạo DOMDocument
// $dom = new DOMDocument();

// // Load nội dung HTML vào DOMDocument
// $dom->loadHTML($response);

//  // Tìm phần tử input email
//  $emailInput = $dom->getElementById('email');

//  // Nếu tìm thấy, đặt giá trị cho trường input
//  if ($emailInput) {
//      $emailInput->setAttribute('value', 'baonn@doppelherz.vn');
//  }

//  // Find the password input element and set its value
//  $passwordInput = $dom->getElementById('pwd');
//  if ($passwordInput) {
//      $passwordInput->setAttribute('value', 'admin@2023');
//  }
 

//  // Find the login button and dispatch a click event on it
//  // Find the buttons with class "btn-primary"
// //  echo"
// //  <script>
// //  setTimeout(function() {
// //      document.querySelector('.btn.btn-primary').click();
// //    }, 100); // sau 0.010 giây      
// //  </script>
// //  ";
//  echo $dom->saveHTML();


// // Giải phóng CURL
// curl_close($curl);
