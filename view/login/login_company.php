<?php
class login{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }   
    public function email($email){
        $e=0;
        if ($email=="") {
            echo "vui lòng nhập email";}
        else {
            $e=1;
            return $e;
        }
    }
    public function pass($pass){
        $p=0;
        if ($pass=="") {
            echo "vui lòng nhập pass";} 
            else{
                $p=1;
                return $p;
            }
    }
    public function login1($pass, $email) {
        if ($pass == "12345") {
            $sql="SELECT * FROM user WHERE email='" . $email . "'";
            $query = mysqli_query($this->conn,$sql);
            if (mysqli_num_rows($query) > 0) {
               echo '<script>window.location.href = "index.php";
               </script>';
            } else {
                return "Có vẻ như mật khẩu hoặc email sai1".$sql."huy";
            }
        } else {
            return "Có vẻ như mật khẩu hoặc email sai";
        }
    }
    
    
}
?>