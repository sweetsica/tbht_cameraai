<?php
class more_staff{
    private $conn;
    
    // public function construct(){
    //     include 'config/db.php';
    //     include 'config/function.php';
    //     $this->conn = $conn;
    // }
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }   
        public function company(){
            $sql = mysqli_query($this->conn, company());
            while($display = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($this->conn, room() . ' where id_company=' . $display['id'] . '');
                echo "
                <optgroup label='".$display['name_company']."'>";
                while($display1=mysqli_fetch_assoc($sql1)){
                    echo "<option value='".$display1['id']."'>".$display1['name_room']."</option>";
                }
                echo "</optgroup>";
            }
        }
    public function input_staff(){
        if(isset($_POST['image'])) {
            $ten_file = $_FILES['image']['name'];
            $duong_dan_tam = $_FILES['image']['tmp_name'];
            $loai_file = $_FILES['image']['type'];
            
            // Kiểm tra xem tệp tin có phải là ảnh không
            if($loai_file == "image/jpeg" || $loai_file == "image/png") {
              // Chuyển đổi tên file thành chữ in hoa
              $ten_file = strtoupper(pathinfo($ten_file, PATHINFO_FILENAME)) . "." . pathinfo($ten_file, PATHINFO_EXTENSION);
              
              // Thay đổi kích thước ảnh và lưu vào thư mục 1280x738 pixels
              $duong_dan_thu_muc = "view/img/";
              $duong_dan_tep_tin = $duong_dan_thu_muc . $ten_file;
              list($chieu_rong, $chieu_cao) = getimagesize($duong_dan_tam);
              $chieu_rong_moi = 1280;
              $chieu_cao_moi = 738;
              $anh_p = imagecreatetruecolor($chieu_rong_moi, $chieu_cao_moi);
              if($loai_file == "image/jpeg") {
                $anh = imagecreatefromjpeg($duong_dan_tam);
              } else {
                $anh = imagecreatefrompng($duong_dan_tam);
              }
              imagecopyresampled($anh_p, $anh, 0, 0, 0, 0, $chieu_rong_moi, $chieu_cao_moi, $chieu_rong, $chieu_cao);
              if($loai_file == "image/jpeg") {
                imagejpeg($anh_p, $duong_dan_tep_tin, 100);
              } else {
                imagepng($anh_p, $duong_dan_tep_tin, 0);
              }
              imagedestroy($anh_p);
              echo "Tệp tin đã được cập nhật thành công.";
              
            } else {
              echo "Loại tệp tin không hợp lệ. Vui lòng tải lên ảnh JPG hoặc PNG.";
            }
          }
          
        
    }


} 

