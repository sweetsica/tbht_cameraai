<?php
    class timekeeping{
        private $conn;

        public $id;
        public $date;
        public $time_now;
        public $time_out;
        public $role;
        public $id_belong;

        //connect db
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function read(){
            // include_once ('../config/db.php');
            $query="SELECT * from timekeeping order by id desc";
            $stmt=mysqli_query($this->conn,$query);
            return $stmt;
        }
        //show data
        public function show($id){
            // include_once ('../config/db.php');
            $query="SELECT * from timekeeping where id=$id LiMIT 1";
            $stmt=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($stmt)){
                $this->id=$row['id'];
                $this->date=$row['date'];
               $this->time_now=$row['time_now'];
               $this->time_out=$row['time_out'];
               $this->role=$row['status'];
               $this->id_belong=$row['id_belong'];
            }

        }
        //create data
        public function create($date,$time_now,$time_out,$role,$id_belong){
            $query="INSERT INTO `cam_ai`.`timekeeping` 
            ( `id`,`date`,`time_now`,`time_out`, `role`,`id_belong`) 
            VALUES (NULL,'$date','$time_now','$time_out','$role','$id_belong')";
              $stmt = mysqli_prepare($this->conn, $query);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function update($id,$date,$time_now,$time_out,$role,$id_belong){
            $query="UPDATE `cam_ai`.`timekeeping` SET `date`='$date',`time_now`='$time_now',`time_out`='$time_out', `role`='$role',`id_belong`='$id_belong'
            where id=$id";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $time_now);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function delete($id){
            $query="DELETE FROM timekeeping WHERE id=$id";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $time_now);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }        
    }
?>