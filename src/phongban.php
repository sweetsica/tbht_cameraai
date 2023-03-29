
        <?php
            include '../config/sql.php';
            include '../config/function.php';


            $sql2=mysqli_query($conn,"SELECT * FROM company ORDER BY `level`");
            echo "<a href='?mb=&=''' class='text-decoration-none  text-light'>Tất cả</a>";
            echo'<ol style="list-style-type:none" class="sidebar-menu-item open ">';
            while($display=mysqli_fetch_assoc($sql2)){
                echo "<a href='?mb=".$display['id']."&='''  class='text-decoration-none  text-light'  target='_self'><li>";
                if($display["name_company"]==''){
                    echo "vui long thêm tên";
                }
                else{
                    echo $display["name_company"];
                }
                echo"</a>";
                
                echo "<ol style='list-style-type:none'>";
                $sql3=mysqli_query($conn,room());
                while($display1=mysqli_fetch_assoc($sql3)){
                    if($display['id']==$display1['id_company'])
                    echo "<li><a href='?mb=".$display['id']."&=".$display1['id']."' class='text-decoration-none  text-light' target='_self'>".$display1['name_room']."</li>";

                }
                echo "</ol></li>";
            }
            echo '</ol>';
        ?>
