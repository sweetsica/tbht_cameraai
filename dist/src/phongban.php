
        <?php
            include '../config/sql.php';
            include '../config/function.php';


            $sql2=mysqli_query($conn,"SELECT * FROM company ORDER BY `level`");
            echo "<a href='?mb=&=''' class='text-decoration-none  text-light'>Tất cả</a>";
            echo'<ol style="list-style-type:none" class="sidebar-menu-item open ">';
            while($hien=mysqli_fetch_assoc($sql2)){
                echo "<a href='?mb=".$hien['id']."&='''  class='text-decoration-none  text-light'  target='_self'><li>";
                if($hien["name_company"]==''){
                    echo "vui long thêm tên";
                }
                else{
                    echo $hien["name_company"];
                }
                echo"</a>";
                
                echo "<ol style='list-style-type:none'>";
                $sql3=mysqli_query($conn,room());
                while($hien1=mysqli_fetch_assoc($sql3)){
                    if($hien['id']==$hien1['id_company'])
                    echo "<li><a href='?mb=".$hien['id']."&=".$hien1['id']."' class='text-decoration-none  text-light' target='_self'>".$hien1['name_room']."</li>";

                }
                echo "</ol></li>";
            }
            echo '</ol>';
        ?>
