<?php
class company_launch{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }  
    public function list_launch(){
        $sql3=mysqli_query($this->conn," SELECT p.name_room, p.id From room as p left join company as b on b.id=p.id_company where b.id=".$_GET['mb']."");
            echo "<li class='sidebar-menu-item'><a href='?mb=".$_GET['mb']."&id='''>
            <span class='sidebar-menu-text co_chu' >Tất Cả</span>
            </a></li >";  
            while($hien1=mysqli_fetch_assoc($sql3)){
                // if($hien['id']==$hien1['id_company'])
                echo "<li class='sidebar-menu-item'><a href='?mb=".$_GET['mb']."&id=".$hien1['id']."'>
                <span class='sidebar-menu-text'style='color:crimson;'>".$hien1['name_room']."</span>
                </a></li>";

            }
    }
    public function list_staff(){
        $sql='';
        if($_GET["id"]==null){
            $sql=mysqli_query($this->conn,"SELECT * From user 
            left join belong as t on user.id=t.id 
            left join room as p on t.id_room=p.id
            left join company   as b on b.id=p.id_company
            where b.id=".$_GET['mb']."");
        }
        else{
            $sql=mysqli_query($this->conn,"SELECT * From user 
            left join belong as t on user.id=t.id_staff 
            left join room as p on t.id_room=p.id
            left join company   as b on b.id=p.id_company
            where b.id=".$_GET['mb']." AND t.id_room='".$_GET['id']."'");
        }
        if(mysqli_num_rows($sql)>0){
                                // $sql=mysqli_query($conn,"SELECT * From user 
                        // left join belong as t on user.id=t.id 
                        // left join room as p on t.mp=p.mp
                        // left join company   as b on b.id=p.id_company
                        // where b.id=".$_GET['mb']."");
                        while($hien=mysqli_fetch_assoc($sql)){
                            $logo=substr("".$hien['fullname']."",0,1);
                            echo'
                            <tr>

                                
                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-32pt mr-8pt">

                                            <span class="avatar-title rounded-circle">'.$logo.'</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column ">
                                                <a href="account.php?id='.$hien['id'].'">
                                                <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$hien['fullname'].'</strong></p>
                                                <small class="js-lists-values-employee-email text-50">'.$hien['email'].'</small>
                                                </a>
                                                </div>

                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                           <span class="js-lists-values-employer-name text-70">'.$hien['date_birth'].'</span>
                                    </div>
                                </td>

                                <td class="text-center js-lists-values-projects small text-70">'.$hien['date_job_receive'].'</td>

                                <td>

                                    <a href=""
                                       class="chip chip-outline-secondary">'.$hien['role'].'</a>

                                </td>
                                <td>
                                <div class="text-center js-lists-values-projects small text-70">';
                                    if(ucwords($hien['status'])=="Đang Làm"){
                                        echo '
                                        <span style="color:green">'.$hien['status'].'</span>
                                        ';
                                    }
                                    elseif(ucwords($hien['status'])=="Đã Nghỉ"){
                                        echo '
                                        <span style="color:red;">'.$hien['status'].'</span>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <span style="color:blue;">'.$hien['status'].'</span>
                                        ';
                                    }
                           echo'</div></td>
                            </tr>
                            ';
                        }
                    }
        else{
            echo '<tr><td colspan="5" class="text-center">Không có dự liệu tại phòng này</td></tr>';
        }
    }

}