<?php include "view/head.php";
    include "config/sql.php";
    include "config/function.php";?>
<link rel="stylesheet" href="../dist/assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Xem Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                    <li class="breadcrumb-item active">

                        Nhân Viên

                    </li>

                </ol>

            </div>
        

        </div>
        <div class="col-auto border-left">
        <a href="api/phong/update_hanet.php?mb=<?php echo $_GET['mb'] ?>" class="btn btn-accent">Cập Nhật Phòng Từ Hanet</a>
        </div>


    </div>
</div>

<div class="container-fluid page__container page__container page-section">

        <?php
        include ('model/class_company_launch.php');
        include ('config/db.php');
            $db=new db();
            $connect=$db->connect();
            $company_launch=new company_launch($connect);
        ?>

    <div class="page-separator">
        <div class="page-separator__text">Danh Sách</div>
    </div>
    <div class="row card-group-row mb-lg-8pt">
      <div class="col-md-2 col-sm-auto card " id="phong1"style="font-size: 17px;">
        <ul class="card-body">
            <?php

             $company_launch->list_launch() ;  
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
                           placeholder="Search ...">

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
                  $company_launch->list_staff();

                            ?>
                </tbody>
            </table>
            
        </div>

        <div class="card-footer p-8pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">

                <li class="page-item dropdown">
                    <a class="page-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       aria-label="Page">
                        <span>1</span>
                    </a>
                   
                </li>

            </ul>

        </div>
        
        <!-- <div class="card-body bordet-top text-right">
15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
</div> -->
    </div>
    </div>
</div>


<?php include 'view/body_js.php';?>