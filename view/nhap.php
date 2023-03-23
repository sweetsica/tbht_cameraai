<?php

$timestamp = 1000 / 1000; // chuyển đổi từ millisecond sang second
$local_time = new DateTime("@$timestamp"); // khởi tạo đối tượng DateTime từ Unix Timestamp
$local_time->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh')); // chuyển đổi sang múi giờ địa phương, ở đây là múi giờ GMT+7

echo $local_time->format('H:i:s d/m/Y'); // hiển thị định dạng giờ địa phương, ví dụ: 09:23:11 28/05/2022
include '../model/timekeeping_one.php';
$data_day_one = new data_day_one();
$data_day_one->bang();
$data_day_one->diem();
include_once ('../model/class_more_staff.php');
include_once('../config/db.php');
include_once '../config/function.php';
 $db=new db();
        $connect=$db->connect();
        $more_staff=new more_staff($connect);
        $more_staff->company() ;  
include ('../model/class_company_launch.php');
$company_launch=new company_launch($connect);
$company_launch->list_launch() ;  

$date_string = '15:30:45 08/03/2023';
$date_object = DateTime::createFromFormat('H:i:s d/m/Y', $date_string);
$milliseconds = $date_object->getTimestamp() * 1000;
echo $milliseconds;




// Tính toán thời gian đầu tiên cho việc thực thi cronjob
$first_run = strtotime('2023-03-13 00:00:00'); // thời gian lần đầu chạy là 15/03/2023 lúc 00:00:00
$interval = 10; // mỗi lần thực thi sẽ chạy sau 1 ngày (86400 giây)
$current_time = time();

// Nếu thời gian hiện tại chưa đến thời điểm thực thi cronjob đầu tiên, chúng ta sẽ kết thúc chương trình
if ($current_time < $first_run) {
    echo "Cronjob chưa sẵn sàng thực thi.";
    exit();
}

// Thực hiện các tác vụ của cronjob
echo "Cronjob đã được thực thi thành công.";

// Tính toán thời gian kế tiếp để thực thi cronjob
$next_run = $current_time + $interval;
$next_date = date('Y-m-d H:i:s', $next_run);

// Cập nhật cronjob để chạy lại vào thời gian kế tiếp
exec('crontab -l > mycron');
exec('echo "'.$next_date.' php /path/to/your/script.php" >> mycron');
exec('crontab mycron');
exec('rm mycron');
// Thiết lập múi giờ
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy thời gian hiện tại
$now = time(); // hoặc $now = strtotime('now');

// Tính thời gian còn lại đến 00:00
$midnight = strtotime('tomorrow') - strtotime('now');

// Định dạng thời gian
$now_formatted = date('Y-m-d H:i:s', $now);
$midnight_formatted = gmdate('H:i:s', $midnight); // chuyển về múi giờ UTC+0

// Hiển thị kết quả
echo "Thời gian hiện tại: {$now_formatted} (UTC+7)\n";
echo "Thời gian còn lại đến 00:00: {$midnight_formatted} (UTC+0)\n";
// Lấy thời gian hiện tại tính đến microgiây
$midnight_formatted = microtime(true);

// Chuyển đổi sang đơn vị miligiây
$milliseconds = round($midnight_formatted * 1000);

// Hiển thị kết quả
echo "Thời gian hiện tại tính đến miligiây: {$milliseconds}";

?>

