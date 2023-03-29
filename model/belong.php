<?php
    class belong{
        private $conn;

        public $id;
        public $id_room;
        public $id_staff;
        
        //connect db
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function read(){
            // include_once ('../config/db.php');
            $query="SELECT * from belong order by id desc";
            $stmt=mysqli_query($this->conn,$query);
            return $stmt;
        }
        //show data
        public function show($id){
            // include_once ('../config/db.php');
            $query="SELECT * from belong where id=$id LIMIT 1";
            $stmt=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($stmt)){
                $this->id=$row['id'];
               $this->id_staff=$row['id'];
               $this->id_room=$row['id'];
            }

        }
        //create data
        public function create($id_staff,$id_room){
            $query="INSERT INTO `cam_ai`.`belong` 
            ( `id`,`id_staff`,`id_room`) 
            VALUES (null,'$id_staff','$id_room')";
              $stmt = mysqli_prepare($this->conn, $query);
            // mysqli_stmt_bind_param($stmt, "sis", $name, $age, $mp);
            
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }
        public function update($id,$id_staff,$id_room){
            $query="UPDATE `cam_ai`.`belong` SET `id_room`=$id_room,`id_staff`=$id_staff
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

            // $query="DELETE FROM belong WHERE id=$id";
            $query1="SELECT * from belong where id=$id";
            
            $sql=mysqli_query($this->conn,$query1);
            
            // // $stmt2 = mysqli_prepare($this->conn, $query2);
            // $stmt1 = mysqli_prepare($this->conn, $query1);
            if(mysqli_num_rows($sql)>0){
            while($display=mysqli_fetch_assoc($sql)){
                $query2="SELECT * from timekeeping where `id_belong`='".$display['id']."'";
                $sql1=mysqli_query($this->conn,$query2);
                if(mysqli_num_rows($sql)>0){
                while($display2=mysqli_fetch_assoc($sql1)){
                    $sql2="DELETE from timekeeping where `id_belong`='".$display2['id_belong']."'";
                    mysqli_query($this->conn,$sql2);

                }
            }}
            $query="DELETE FROM belong WHERE `id`='$id'";
            $stmt = mysqli_prepare($this->conn, $query);
              $stmt = mysqli_prepare($this->conn, $query);
             if(mysqli_stmt_execute($stmt)){
                return true;
             }
             else{
                printf("Error %s.\n");
                return false;
             }
        }  
    }
    }
?>