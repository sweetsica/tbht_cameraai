<?php
// Tạo đối tượng DateTime cho thời điểm đầu tiên
$start_time = new DateTime('08:00:00');

// Tạo đối tượng DateTime cho thời điểm thứ hai
$end_time = new DateTime('07:59:01');

// Tính toán khoảng thời gian giữa hai thời điểm
$time_diff = $start_time->diff($end_time);

// In ra khoảng thời gian dưới định dạng H:i:s
echo $time_diff->format('%H:%i:%s');

?>
