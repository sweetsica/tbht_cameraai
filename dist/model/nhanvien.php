<?php
    class nhanvien{
        private $conn;

        public $id;
        public $fullname;
        public $email;
        public $date_birth;
        public $date_job_receive;
        public $status;
        public $role;

        //connect db
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function read(){
            // include_once ('../config/db.php');
            $query="SELECT * from user order by id desc";
            $stmt=mysqli_query($this->conn,$query);
            return $stmt;
        }
        //show data
        public function show($id){
            // include_once ('../config/db.php');
            $query="SELECT * from user where id=$id LiMIT 1";
            $stmt=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($stmt)){
                $this->id=$row['id'];
                $this->fullname=$row['fullname'];
               $this->email=$row['email'];
               $this->date_birth=$row['date_birth'];
               $this->date_job_receive=$row['date_job_receive'];
               $this->status=$row['status'];
            }

        }
        //create data
        public function create($id,$fullname,$email,$date_birth,$date_job_receive,$status,$role){
            $query = "INSERT INTO `cam_ai`.`user` 
            (`id`, `fullname`, `email`, `date_birth`, `date_job_receive`, `status`,
             `role`) VALUES ('$id', '$fullname', '$email', '$date_birth', 
             '$date_job_receive', '$status', '$role')";
               $stmt = mysqli_prepare($this->conn, $query);

               if (mysqli_stmt_execute($stmt)) {
                   return true;
                   
               } else {
                   printf("Error %s.\n", mysqli_error($this->conn)); // Added error message to printf()
                   return false;
               }

        }
        public function update($id,$fullname,$email,$date_birth,$date_job_receive,$status,$role){
            $query="UPDATE `cam_ai`.`user` SET `fullname`='$fullname',`email`='$email',
            `date_birth`='$date_birth', `date_job_receive`='$date_job_receive', `status`='$status',`role`='$role'
            where id=$id";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $email);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function delete($id){
            $query="DELETE FROM user WHERE `id`=$id"; 
            $query1="DELETE FROM belong WHERE `id`=$id";  
            $stmt1 = mysqli_prepare($this->conn, $query1);
            $stmt = mysqli_prepare($this->conn, $query);
            if(mysqli_stmt_execute($stmt1)){
                echo "Đã xóa ở bảng thuộc";
            }
            else{
                echo "ko có giá trị ở bảng thuộc";
            }
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                printf("Error %s.\n", mysqli_error($this->conn)); // Added error message to printf()
                return false;
            }
        }        
    }
?>