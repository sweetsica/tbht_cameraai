<?php
include "dist/config/sql.php";
include 'dist/config/function.php';

// Tạo một mảng chứa 100 dòng
$sql =mysqli_query($conn,"SELECT * from user");
$i=1;
while($hien=mysqli_fetch_assoc($sql)){
    $line=array($i=>array($hien['id'],$hien['fullname'],$hien['email'],$hien['date_birth'],$hien['date_job_receive'],$hien['status'],$hien['role']));
    $i++;
}
echo '<pre>';
print_r($line);
print_r(mysqli_fetch_assoc($sql));
echo '</pre>';
// Thực hiện truy vấn SQL
$result = mysqli_query($conn, "SELECT * FROM user");

// Tạo mảng để lưu kết quả truy vấn
$data = array();

// Lặp qua kết quả truy vấn và lưu dữ liệu vào mảng
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
echo '<pre>';
// print_r($data);
echo '</pre>';
// Xử lý dữ liệu trong mảng
foreach ($data as $item) {
   
}

// Đóng kết nối tới cơ sở dữ


$lines = range(1, 90);

// Số dòng trên mỗi trang
$lines_per_page = 10;

// Tổng số trang
$total_pages = ceil(count($data) / $lines_per_page);

// Trang hiện tại
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$current_page = max(1, min($current_page, $total_pages));

// Lấy dòng trên trang hiện tại
$offset = ($current_page - 1) * $lines_per_page;
$display_lines = array_slice($data, $offset, $lines_per_page);

// Hiển thị dòng trên trang hiện tại
foreach ($display_lines as $data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Hiển thị các nút trang
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<strong>$i</strong> ";
    } else {
        echo "<a href='?page=$i'>$i</a> ";
    }
}


session_start();
echo $_SESSION['accesstoken'];
setcookie('accesstoken', 'john', time()+3600);
echo $_COOKIE['accesstoken'];
//chrome-extension://fdpohaocaechififmbbbbbknoalclacl/capture.html?id=2&url=https%3A%2F%2Fchat.openai.com%2Fchat