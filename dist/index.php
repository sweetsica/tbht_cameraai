<?php include "view/head.php";

?>
<link rel="stylesheet" href="../dist/assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                    <li class="breadcrumb-item active">

                        Nhân Viên

                    </li>

                </ol>

            </div>


        </div>

        <div class="row"
             role="tablist">
            <div class="col-auto border-left">
                <a href="more_staff.php"
                   class="btn btn-accent">Thêm Nhân Viên</a>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid page__container page__container page-section">

    

    <div class="page-separator">
        <div class="page-separator__text">Employees</div>
    </div>

    <div class="card mb-0">

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
                           placeholder="Search ...">

                    <label class="sr-only"
                           for="inlineFormRole">Role</label>
                    <select id="inlineFormRole"
                            class="custom-select mb-2 mr-sm-2 mb-sm-0">
                        <option value="All Roles">All Roles</option>
                    </select>

                    <div class="ml-auto mb-2 mb-sm-0 custom-control-inline mr-0">
                        <label class="form-label mb-0"
                               for="active">Active</label>
                        <div class="custom-control custom-checkbox-toggle ml-8pt">
                            <input checked=""
                                   type="checkbox"
                                   id="active"
                                   class="custom-control-input">
                            <label class="custom-control-label"
                                   for="active">Active</label>
                        </div>
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
                                <label class="custom-control-label"
                                       for="customCheckAllstaff"><span class="text-hide">Toggle all</span></label>
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
                        include "config/sql.php";
                        include "config/function.php";
                        $sql=mysqli_query($conn,"SELECT * From user");
                        $i=0;
                        $data=array();
                        while ($row=mysqli_fetch_array($sql)){
                            $data[]=$row;
                        }
                        $so_dong=10;
                        $tong_dong=ceil(count($data)/$so_dong);
                        $hien_tai=isset($_GET['page']) ? intval($_GET['page']):1;
                        $hien_tai=max(1,min($hien_tai,$tong_dong));
                        $bu_lai=($hien_tai-1)*$so_dong;
                        $dong_hientai= array_slice($data,$bu_lai,$so_dong);
                        foreach($dong_hientai as $data){
                            $logo=substr("".$data[1]."",0,1);
                                if($i>=10){
                                    
                                }
                            echo'
                            <tr>

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input js-check-selected-row"
                                               id="customCheck1_2">
                                        <label class="custom-control-label"
                                               for="customCheck1_2"><span class="text-hide">Check</span></label>
                                    </div>
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
                                                <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$data[1].'</strong></p>
                                                <small class="js-lists-values-employee-email text-50">'.$data[2].'</small>
                                            </div>
                                            </a>
                                        </div>
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
                    ?>



                </tbody>
            </table>
        </div>

        <div class="card-footer p-8pt "'id='hien'>

            <ul class="pagination justify-content-start pagination-xsm m-0">

                <li class="page-item dropdown">
                    <a class="page-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       aria-label="Page">
                        <?php
                        for($i=1;$i<=$tong_dong;$i++){
                            if($i==$hien_tai){
                                echo " <span>$i</span>";
                            } 
                        }
                        ?>
                        
                    </a>
                    <div class="dropdown-menu " >
                        <?php
                            for($i=1;$i<=$tong_dong;$i++){
                                if($i==$hien_tai){
                                    echo "<strong>$i</strong> ";
                                }
                                
                                if($i!=$hien_tai){
                                    echo '<a href="?page='.$i.'"
                                    class="dropdown-item active">'.$i.'</a>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </li>

            </ul>

        </div>
        <!-- <div class="card-body bordet-top text-right">
15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
</div> -->

    </div>

</div>

<?php

include 'view/body_js.php';?>