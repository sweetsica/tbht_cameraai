<?php
function user(){
    $sql="SELECT * from user";
    return $sql;
}
function room(){
    $sql="SELECT * from room";
    return $sql;
}
function belong(){
    $sql="SELECT * from belong";
    return $sql;
}
function timekeeping(){
    $sql="SELECT * from timekeeping";
    return $sql;
}
function company(){
    $sql="SELECT * from company";
    return $sql;
}
function id_thuoc(){
    include 'sql.php';
    
    $sql_ten1=mysqli_query($conn,user());
    while($ten2=mysqli_fetch_assoc($sql_ten1)){
        $sql_phong1=mysqli_query($conn,room());
        while($name_room1=mysqli_fetch_assoc($sql_phong1)){
            $sql4="SELECT  room.name_room ,belong.id_room from belong 
            LEFT JOIN room on room.id=belong.id_room 
            LEFT JOIN user on user.id=belong.id_staff
            -- WHERE room.mp=".$name_room1['id']." AND user.id=".$ten2['id']."
            ";
            // while($thuoc1=mysqli_fetch_assoc($sql_thuoc1)){
                $h_tp=mysqli_query($conn,$sql4);
                while($display_tphong=mysqli_fetch_assoc($h_tp)){
                    echo "<a href='timekeeping.php?id=".$display_tphong['id_room']."'>".$display_tphong['name_room']."</a><br>";
                    // return $display_tphong['id'];
                }
            }

    }
}
function tennv(){
    include 'sql.php';
    $sql_ten1=mysqli_query($conn,user());
    echo '
    <select name="ten2" data-toggle="select"
    class="form-control form-control-lg" >';
    while($display=mysqli_fetch_assoc($sql_ten1)){
        echo'<option value="'.$display['id'].'"> '.$display['fullname'].'</option>';
    }
        echo'
        </select>
        ';
}
function phong_ban(){
    include 'sql.php';
    $sql_company1=mysqli_query($conn,company());
    echo '
    <select name="ban2" data-toggle="select"
    class="form-control form-control-lg" >';

    while($display=mysqli_fetch_assoc($sql_company1)){
        $sql1=mysqli_query($conn,room().' where id_company='.$display['id'].'');
        echo'<optgroup label="'.$display['name_company'].'">';
        while($display1=mysqli_fetch_assoc($sql1)){
            echo "<option value='".$display1['id']."'>".$display1['name_room']."</option>";
            }
        echo'
        </optgroup>';
    }
        echo'
        </select>
        ';
}
?>