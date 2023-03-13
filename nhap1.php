<?php
// Tải trang web từ URL
$url = $auth_url;
$dom = new DOMDocument();
$dom->loadHTMLFile($url);

// Tìm phần tử chứa chữ "Đồng ý"
$agreeLink = $dom->getElementById('auth-app-gdpr');

// Kiểm tra xem phần tử đã được tìm thấy chưa
if ($agreeLink) {
  // Kích hoạt sự kiện click trên phần tử "Đồng ý"
  $agreeLink->click();
}
?>
