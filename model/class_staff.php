<?php
class staff{
    private $conn;
    private $tong_dong;
    private $hien_tai;

    public function __construct($db)
    {
        $this->conn=$db;
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }  
    public function bang(){
        $sql=mysqli_query($this->conn,"SELECT * From user");
        $i=0;
        $data=array();
        while ($row=mysqli_fetch_array($sql)){
            $data[]=$row;
        }
        $so_dong=10;
        $this->tong_dong=ceil(count($data)/$so_dong);
        $this->hien_tai=isset($_GET['page']) ? intval($_GET['page']):1;
        $this->hien_tai=max(1,min($this->hien_tai,$this->tong_dong));
        $bu_lai=($this->hien_tai-1)*$so_dong;
        $dong_hientai= array_slice($data,$bu_lai,$so_dong);
        foreach($dong_hientai as $data){
            $logo=substr("".$data[1]."",0,1);
                if($i>=10){
                    
                }
            echo'
            <tr>

                <td class="pr-0">

                </td>
                <td>

                    <div class="media flex-nowrap align-items-center"
                         style="white-space: nowrap;">
                        <div class="avatar avatar-32pt mr-8pt">

                            <span class="avatar-title rounded-circle">'.$logo.'</span>

                        </div>
                        <div class="media-body">
                            <a href="account.php?id='.$data[0].'">
                            <div class="d-flex flex-column">
                                <p class="mb-0"style="color: lightseagreen;"> <strong class="js-lists-values-employee-name color-name">'.$data[1].'</strong></p>

                            </div>
                            </a>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="d-flex align-items-center">
                           <span class="js-lists-values-employer-name text-70">'.$data[0].'</span>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                           <span class="js-lists-values-employer-name text-70">'.$data[2].'</span>
                           
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                           <span class="js-lists-values-employer-name text-70">'.$data[3].'</span>
                    </div>
                </td>

                <td class="text-center js-lists-values-projects small text-70">'.$data[4].'</td>

                <td>

                    <a href=""
                       class="chip chip-outline-secondary">'.$data[6].'</a>

                </td>
                <td>
                <div class="text-center js-lists-values-projects small text-70">';
                    if(ucwords($data[5])=="Đang Làm"){
                        echo '
                        <span style="color:green">'.$data[5].'</span>
                        ';
                    }
                    elseif(ucwords($data[5])=="Đã Nghỉ"){
                        echo '
                        <span style="color:red;">'.$data[5].'</span>
                        ';
                    }
                    else{
                        echo '
                        <span style="color:blue;">'.$data[5].'</span>
                        ';
                    }
           echo'</div></td>
            </tr>
            ';
            $i++;
        }

    }
    public function num_page(){
        echo'
        <li class="page-item dropdown">
                    <a class="page-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       aria-label="Page">
                        ';
                        for($i=1;$i<=$this->tong_dong;$i++){
                            if($i==$this->hien_tai){
                                echo " <span>$i</span>";
                            } 
                        }
                        echo'
                        
                    </a>
                    <div class="dropdown-menu " >
                        ';
                            for($i=1;$i<=$this->tong_dong;$i++){
                                if($i==$this->hien_tai){
                                    echo "<strong>$i</strong> ";
                                }
                                
                                if($i!=$this->hien_tai){
                                    echo '<a href="?page='.$i.'"
                                    class="dropdown-item active">'.$i.'</a>
                                    ';
                                }
                            }
                        
                 echo '  </div>
                </li>';
    }

}
?>