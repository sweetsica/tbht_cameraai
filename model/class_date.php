<?php
class date{
    private $conn;
    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function table($Month,$dateYear,$dateMonth,$dateactually){
        $sql=mysqli_query($this->conn,
        "SELECT DISTINCT n.fullname ,n.id FROM timekeeping AS l
        left JOIN belong AS t ON t.id=l.id_belong
        LEFT JOIN room AS p ON p.id=t.id_room
        LEFT JOIN user AS n ON n.id=t.id_staff");
        while($hien=mysqli_fetch_assoc($sql)){
            $logo=substr("".$hien['fullname']."",0,1);
        echo'<tr>
                        <td>

                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                <div class="avatar avatar-32pt mr-8pt">

                                    <span class="avatar-title rounded-circle">'.$logo.'</span>

                                </div>
                                <div class="media-body">
                                    <a href="time_one_people.php?id='.$hien['id'].'">
                                    <div class="d-flex flex-column">
                                        <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$hien['fullname'].'</strong></p>
                                       
                                    </div>
                                    </a>
                              </div>
                </div>
                
            </td>';

        for($i=1;$i<$Month;$i++){ 
            $date="$dateYear-$dateMonth-".$i."";
            $datedaysql=date('Y-m-d',strtotime($date));
            
            $sql_string="SELECT l.role FROM timekeeping AS l
            left JOIN belong AS t ON t.id=l.id_belong
            LEFT JOIN room AS p ON p.id=t.id_room
            LEFT JOIN user AS n ON n.id=t.id_staff
            where n.id='".$hien['id']."' AND l.date='".$datedaysql."'";
            $sql1=mysqli_query($this->conn,$sql_string);
             if(mysqli_num_rows($sql1)>0){
                while($hien2=mysqli_fetch_assoc($sql1)){
                    $loai=substr("".$hien2['role']."",0,1);
                    $mau=($loai!="-")?"green":"firebrick";
                    echo'
                    <td>
                    
                    <small ><strong class="js-lists-values-name text-black-100" ><font style="color:'.$mau.'">'.$hien2['role'].'</font></strong></small>
                    </td>';

                }
                 
                
             }                                             
            else{
                    
                    if($datedaysql<$dateactually){
                        echo'<td style="background-color: orangered;">'; 
                    }
                    else{
                        echo'<td>';
                    }                         
                    echo '</td>';
                }
            }
                    echo'
                </tr>';
            }
    }
    public function calendar($Month,$dateMonth,$dateYear){
        for($i=1;$i<$Month;$i++){
            $date="".$i."-$dateMonth-$dateYear";
            $datethu=date("l",strtotime($date));
             $l='';
                 switch ($datethu)
                 {
                             case 'Monday':
                                $l="<th font><p style='color:#6cdfc4;'>T2</p>
                                ".$i."</th>";
                                break;
                             case 'Tuesday':
                                 $l="<th ><p style='color:#6cdfc4;'>T3</p>
                                ".$i."</th>";
                                break;
                             case 'Wednesday':
                                 $l="<th ><p style='color:#6cdfc4;'>T4</p>
                                ".$i."</th>";
                                break;
                             case 'Thursday':
                                 $l="<th ><p style='color:#6cdfc4;'>T5</p>
                                ".$i."</th>";
                                break;
                             case 'Friday':
                                 $l="<th ><p style='color:#6cdfc4;'>T6</p>
                                ".$i."</th>";
                                break;
                             case 'Saturday':
                                 $l="<th ><p style='color:#6cdfc4;'>T7</p>
                                ".$i."</th>";
                                break;
                             case 'Sunday':
                                $l="<th ><p style='color:red;'>CN</p>
                                    ".$i."</th>";
                                break;   }
            echo $l;
            
        }
    }
    public function Month($dateMonth,$dateYear){
        $Month=0;
        switch ($dateMonth)
        {
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                    $Month=31;
                    break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                    $Month=30;
                    break;
                    case 2:
                    {
                    $Month = ((($dateYear % 4 == 0) && ($dateYear % 100 != 0)) 
                    || ($dateYear % 400 == 0)) ?29 : 28;
                    }
                    break;
            }
            return $Month;
    }
}