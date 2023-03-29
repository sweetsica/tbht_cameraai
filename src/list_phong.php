<!DOCTYPE html>
<html lang="en">
<?php include "../view/head_html.php";?>
<table class="table mb-0 thead-border-top-0 table-nowrap">
<?php
$mb='1';
$mp='1';
$k=0;
include '../config/sql.php';
include '../config/function.php';
$uri = $_SERVER['REQUEST_URI'];
    if(($mb==''&&$mp=='')||($uri=='/src/list_phong.php?mb=&id=')){
        echo "<tr>
            <td>Mã company</td>
            <td>Tên company</td>
        </tr>";
        $sql=mysqli_query($conn,company());
        while($display=mysqli_fetch_assoc($sql)){
            echo"<tr><td><a href='?mb=".$display['id']."&id='''  class='text-decoration-none 
 text-body-secondary'>".$display['id']."</a></td>
            <td><a href='?mb=".$display['id']."&id=''' class='text-decoration-none 
 text-body-secondary'>".$display['name_company']."</a></td>";
            echo "</tr>";
        }
    }
    
    elseif(($uri!='/src/list_phong.php')){
        $mb=$_GET['mb'];
        $mp=$_GET['id'];
        if($mb!=""&&$mp==''){
            echo "<tr >
            <td>Mã phòng</td>
            <td>Tên phòng</td>
            <td>Thuộc company</td>
            </tr>";
            
            $sql2=mysqli_query($conn,'SELECT company.name_company,room.name_room,room.mp from company left join room on company.mb=room.id_company where room.id_company='.$mb.'');
            while($display1=mysqli_fetch_assoc($sql2)){
                echo"<tr>
                <td><a href='?mb=".$mb."&id=".$display1['id']."' class='text-decoration-none 
 text-body-secondary'>".$display1['id']."</a>
                </td>
                <td><a href='?mb=".$mb."&id=".$display1['id']."' class='text-decoration-none 
 text-body-secondary'>".$display1['name_room']."</a></td>
                <td><a href='?mb=".$mb."&id=".$display1['id']."' class='text-decoration-none 
 text-body-secondary'>".$display1['name_company']."</a></td>";
                echo "</tr>";
                
            }
        }
        //  $mp=$_GET['id'];
        if($mb!=''&&$mp!=''){
            // $mb=$_GET['mb'];
            // $mp=$_GET['id'];
            echo' <tr>
                <td>STT</td>
                <td>Mã nhân viên</td>
                <td>Tên nhân viên</td>
                <td>Email nhân viên</td>
                <td>Ngày sinh</td>
                <td>Ngày vào làm</td>
                <td>Tình Trạng</td>
                <td>Các phòng bán đang làm</td>
                <td>Sửa</td>
                <td>xóa</td>
            </tr>';
            $sql3 =mysqli_query($conn,belong().' where id_room='.$mp.'');
            if(mysqli_num_rows($sql3)>0){
            while($display2=mysqli_fetch_assoc($sql3)){
                $sql3_use=mysqli_query($conn,user().' where id='.$display2['id'].'');
                
                    $i=1;
                    while($ten1=mysqli_fetch_assoc($sql3_use)){
                            echo "<tr>
                           
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>$i</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['id']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['fullname']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['email']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['date_birth']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['date_job_receive']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>".$ten1['status']."</a></td>
                            <td><a href='../view/nhan_vien.php?id=".$ten1['id']."' class='text-decoration-none 
 text-body-secondary' target='_top'>";
                            $sql5=mysqli_query($conn,room());
                            while ($display_mp=mysqli_fetch_assoc($sql5)){
                            $sql4="SELECT  room.name_room ,belong.id_room from belong 
                            LEFT JOIN room on room.id=belong.id_room
                             LEFT JOIN user on user.id=belong.id_staff
                             WHERE room.id=".$display_mp['id']." AND user.id=".$ten1['id']."";
                             $h_tp=mysqli_query($conn,$sql4);
                             while($display_tphong=mysqli_fetch_assoc($h_tp)){
                                    if(mysqli_num_rows($h_tp)>0){
                                    echo "".$display_tphong['name_room']."<br>";
                                    }
                                    if(mysqli_num_rows($h_tp)<0){
                                        echo "Chưa có phòng nào<br>";
                                        }

                            }
                        }
                    }
                    echo'</a></td>';
                }
            }
            else{
                echo"<tr align='center'><td colspan='10' >Hiện tại ko có nhân viên nào cả</td></tr>";
            }

        }  
}

?>      
</table>
</html>