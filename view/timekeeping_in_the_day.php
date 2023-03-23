<?php 
include_once "head.php";
include_once "../config/sql.php";
include_once "../config/function.php";
?>
<link rel="stylesheet" href="assets/css/css.css">


<!-- // END Header -->


<div class="container-fluid page__container page__container page-section">
<div class="page-separator">
        <div class="page-separator__text">Tỉ lệ phần trăm </div>
    </div>
    <div class="card-header d-flex">
        <?php
           
           include_once '../model/timekeeping_one.php';
           $data_day_one = new data_day_one();
        $data_day_one->diem();
        $array_data = $data_day_one->diem();
        ?>
    <div class="flex d-flex align-items-center">
    <div class="pie" style="--p:<?php print_r($array_data[0]);
    echo ';--c:darkblue">'; 
    print_r($array_data[0]);
    echo '%
    <strong style="font-size: 12px;">Làm muộn</strong>
    </div>'
    ;?>
    </div>
    <div class="flex d-flex align-items-center">
    <div class="pie" style="--p:<?php print_r($array_data[1]);
    echo ';--c:orange">'; 
    print_r($array_data[1]);
    echo '%
    <strong style="font-size: 12px;">Về sớm</strong>
    </div>'
    ;?>
    </div>
    <div class="flex d-flex align-items-center">
    <div class="pie" style="--p:<?php print_r(100-$array_data[2]);
    echo ';--c:lightgreen">'; 
    print_r(100-$array_data[2]);
    echo '%
    <strong style="font-size: 12px;">Không đi làm</strong>
    </div>
    
    ';?>

    </div>
    </div>
    <?php
       
    ?>



    <div class="page-separator">
        <div class="page-separator__text">Nhân viên đi cam trong ngày</div>
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
                           placeholder="Tìm kiếm ...">

                    <label class="sr-only"
                           for="inlineFormRole">Role</label>
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
                               data-sort="js-lists-values-employer-name">Ảnh</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Tên nhân viên </a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Mã nhân viên</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Đi đến</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Đi về</a>
                        </th>
                        <th style="width: 37px;">Địa điểm</th>

                        <th style="width: 51px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-earnings">Vai trò</a>
                        </th> 
                    </tr>
                </thead>
                <tbody class="list"
                       id="staff">
                      <?php
                        // include_once 'model/timekeeping_one.php';

                        $data_day_one->bang();
                      ?> 
                </tbody>
            </table>
        </div>


    </div>

</div>
<?php 
include_once 'body_js.php';?>