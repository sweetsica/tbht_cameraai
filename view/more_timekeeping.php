<?php include "head.php";
include '../config/sql.php' ;
include '../config/function.php' ;?>
<link rel="stylesheet" href="assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Chấm công</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>

                    <li class="breadcrumb-item active">

                        Chấm công

                    </li>

                </ol>

            </div>


        </div>


    </div>
</div>

<div class="container-fluid page__container page__container page-section">

    

    <div class="page-separator">
        <div class="page-separator__text">Employees</div>
    </div>
    <div class="row card-group-row mb-lg-8pt">
      <div class="col-md-2 col-sm-auto card " id="phong1">
        <ul class="card-body">
            <?php
                    echo '
                    <li class="sidebar-menu-item"
                    <a class="sidebar-menu-button" href="projects.html">
                    <span class="sidebar-menu-text co_chu">Tất cả</span>
                    </a>
                    ';
                    $sql2=mysqli_query($conn,"SELECT * FROM company ORDER BY `level`");
                    if(mysqli_num_rows($sql2)>0){
                    while($hien=mysqli_fetch_assoc($sql2)){
                        $k='';
                        echo '<li class="sidebar-menu-item" style="padding-top: 0px;">
                        <a class="sidebar-menu-button" href="company_launch.php?mb='.$hien['id'].'&id=""" >';
                                if($hien["name_company"]==''){
                                    $k="vui long thêm tên";
                                }
                                else{
                                    $k=$hien["name_company"];
                                }
                                    echo '<span class="sidebar-menu-text">'.$k.'</span>';
                                echo"</a>";

                                $sql3=mysqli_query($conn," SELECT p.name_room, p.id From room as p left join company as b on b.id=p.id_company where b.id=".$hien['id']."");
                                echo" <ul class='card-body'style='padding-top: 0px;'>";
                                while($hien1=mysqli_fetch_assoc($sql3)){
                                    // if($hien['id']==$hien1['id_company'])
                                    echo "<li class='sidebar-menu-item'><a href='?mb=".$hien['id']."&id=".$hien1['id']."'>
                                    <span class='sidebar-menu-text'>&nbsp&nbsp&nbsp ".$hien1['name_room']."</span>
                                    </a></li>";
                                    
                                }
                                echo"</ul>";  
                    echo' </li>';
            }}
            ?>
        </ul>
      </div>  
    <div class="card mb-0 col-md-10 col-sm">

        <div class="table-responsive"
             data-toggle="lists"
             data-lists-sort-by="js-lists-values-employee-name"
             data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

            <div class="card-header">
                <form class="form-inline">
                    <label class="mr-sm-2 form-label"
                           for="inlineFormFilterBy">Tìm kiếm:</label>
                    <input type="text"
                           class="form-control search mb-2 mr-sm-2 mb-sm-0"
                           id="inlineFormFilterBy"
                           placeholder="Tìm kiếm ...">

                    <label class="sr-only"
                           for="inlineFormRole">Role</label>



                    </div>

                    <!-- <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
<input type="checkbox" class="custom-control-input" id="inlineFormPurchase">
<label class="custom-control-label" for="inlineFormPurchase">Made a Purchase?</label>
</div> -->
                </form>
            </div>

            <table class="table mb-0 thead-border-top-0 table-nowrap">
                <thead>
                    <tr>

                        <th style="width: 18px;"
                            class="pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input js-toggle-check-all"
                                       data-target="#staff"
                                       id="customCheckAllstaff">
                                
                            </div>
                        </th>

                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employer-name">Mã Nhân Viên</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Ngày Sinh</a>
                        </th>


                        <th class="text-center"
                            style="width: 48px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-projects">Ngày vào</a>
                        </th>

                        <th style="width: 37px;">Vai trò</th>

                        <!-- <th style="width: 120px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-activity">Activity</a>
                        </th>-->
                        <th style="width: 51px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-earnings">Tình trạng</a>
                        </th> 
                        <th style="width: 24px;"
                            class="pl-0"></th>
                    </tr>
                </thead>
                <tbody class="list"
                       id="staff">
                    <?php
                    $sql='';
                    if($_GET["id"]==""){
                        $sql=mysqli_query($conn,"SELECT user.id,
                        user.fullname,user.email,
                        user.date_birth,user.date_job_receive,
                        user.`status`,user.role,t.id AS id_belong From user 
                        left join belong as t on user.id=t.id_staff
                        left join room as p on t.id_room=p.id
                        left join company   as b on b.id=p.id_company
                        where b.id=".$_GET['mb']."");
                    }
                    else{
                        $sql=mysqli_query($conn,"SELECT user.id,user.fullname,
                        user.email,user.date_birth,user.date_job_receive,
                        user.`status`,user.role,t.id AS id_belong From user 
                        left join belong as t on user.id=t.id_staff 
                        left join room as p on t.id_room=p.id
                        left join company   as b on b.id=p.id_company
                        where b.id=".$_GET['mb']." AND t.id_room=".$_GET['id']."");
                    }
                        // $sql=mysqli_query($conn,"SELECT * From user 
                        // left join belong as t on user.id=t.id 
                        // left join room as p on t.mp=p.mp
                        // left join company   as b on b.id=p.id_company
                        // where b.id=".$_GET['mb']."");
                        while($hien1=mysqli_fetch_assoc($sql)){
                            $logo=substr("".$hien1['fullname']."",0,1);
                            echo'
                            <tr>

                                <td></td>
                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-32pt mr-8pt">

                                            <span class="avatar-title rounded-circle">'.$logo.'</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column ">
                                                <a href="indemnify.php?id='.$hien1['id_belong'].'">
                                                '.$hien1['id_belong'].'
                                                <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$hien1['fullname'].'</strong></p>
                                                <small class="js-lists-values-employee-email text-50">'.$hien1['email'].'</small>
                                                </a>
                                                </div>

                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                           <span class="js-lists-values-employer-name text-70">'.$hien1['date_birth'].'</span>
                                    </div>
                                </td>

                                <td class="text-center js-lists-values-projects small text-70">'.$hien1['date_job_receive'].'</td>

                                <td>

                                    <a href=""
                                       class="chip chip-outline-secondary">'.$hien1['role'].'</a>

                                </td>
                                <td>
                                <div class="text-center js-lists-values-projects small text-70">';
                                    if(ucwords($hien1['status'])=="Đang Làm"){
                                        echo '
                                        <span style="color:green">'.$hien1['status'].'</span>
                                        ';
                                    }
                                    elseif(ucwords($hien1['status'])=="Đã Nghỉ"){
                                        echo '
                                        <span style="color:red;">'.$hien1['status'].'</span>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <span style="color:blue;">'.$hien1['status'].'</span>
                                        ';
                                    }
                           echo'</div></td>
                            </tr>
                            ';
                        }
                            ?>
                </tbody>
            </table>
            
        </div>
    </div>
    </div>
</div>


<?php include 'body_js.php';?>