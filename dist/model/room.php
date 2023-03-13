<?php
    class room{
        private $conn;

        public $id;
        public $name_room;
        public $id_company;
        public $level;
        //connect db
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function read(){
            // include_once ('../config/db.php');
            $query="SELECT * from room order by id desc";
            $stmt=mysqli_query($this->conn,$query);
            return $stmt;
        }
        //show data
        public function show($id){
            // include_once ('../config/db.php');
            $query="SELECT * from room where id=$id LIMIT 1";
            $stmt=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($stmt)){
                $this->id=$row['id'];
                $this->name_room=$row['name_room'];
               $this->id_company=$row['id_company'];
               $this->level=$row['level'];
            }

        }
        //create data
        public function create($id,$name_room,$id_company,$level){
            $query="INSERT INTO `cam_ai`.`room` 
            (`id`, `name_room`,`id_company`,`level`) 
            VALUES ('$id','$name_room','$id_company','$level')";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $id_company);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function update($id,$name_room,$id_company,$level){
            $query="UPDATE `cam_ai`.`room` SET `name_room`='$name_room',`id_company`=$id_company,`level`=$level
            where id=$id";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $id_company);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function delete($id){
            // $query1="DELETE FROM belong WHERE mp='$id'";
            $query1="SELECT * from belong where id_room=$id";
            
            $sql=mysqli_query($this->conn,$query1);
            
            // // $stmt2 = mysqli_prepare($this->conn, $query2);
            // $stmt1 = mysqli_prepare($this->conn, $query1);
            if(mysqli_num_rows($sql)>0){
            while($hien=mysqli_fetch_assoc($sql)){
                $query2="SELECT * from timekeeping where `id_belong`='".$hien['id']."'";
                $sql1=mysqli_query($this->conn,$query2);
                if(mysqli_num_rows($sql)>0){
                while($hien2=mysqli_fetch_assoc($sql1)){
                    $sql2="DELETE from timekeeping where `id_belong`='".$hien2['id_belong']."'";
                    mysqli_query($this->conn,$sql2);

                }}
                $sql3="DELETE from belong where `id_room`=".$hien['id']."";
                var_dump($sql3);
                mysqli_query($this->conn,$sql3);
            }}
            $query="DELETE FROM room WHERE `id`='$id'";
            $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $id_company);
            if(mysqli_stmt_execute($stmt)){
                    echo "Đã xóa ở bảng thuộc và bên chấm công";
                   return true;
                }
                else{
                   printf("Error %s.\n");
                   echo "ko có giá trị ở bảng thuộc";
                   return false;
                }
            }
    }
?>