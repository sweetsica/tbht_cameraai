<?php include "head.php";
    include "../config/sql.php";
    include "../config/function.php";?>
<link rel="stylesheet" href="assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Thông Tin Đi Làm Của Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>

                    <li class="breadcrumb-item active">

                        Nhân Viên

                    </li>

                </ol>

            </div>
        

        </div>
    </div>
</div>

<div class="container-fluid page__container page__container page-section">

        <?php
        include_once ('../model/class_time_one_people.php');
        include_once ('../config/db.php');
        $db=new db();
        $connect=$db->connect();
            $time_one_people=new time_one_people($connect);
        $data=include_once ('../api/person/getUserInfoByPersonID.php');
        $timezone = new DateTimeZone('Asia/Ho_Chi_Minh');

        ?>

    <div class="page-separator">
        <div class="page-separator__text">Danh Sách</div>
    </div>
    <div class="row card-group-row mb-lg-8pt">
      <div class="col-md-2 col-sm-auto card " id="phong1"style="font-size: 17px;">
      <div class="cutiing" style="margin: 10px auto;">
            <?php
            echo '<img src="';
            print_r($data['data']['avatar']);
            echo '" alt="không tìm thấy ảnh" >';
            ?>     
        <h6 class="card-title m-0" ><?php
            print_r($data['data']['name']);
        ?></h6>
        </div>
        <div>
            <p>MNV: <samp><?php
             print_r($data['data']['personID']);
            ?></samp></p>
        </div>
      </div>  
    <div class="card mb-0 col-md-9 col-sm"style="height: 100%;">
    <div class="col-lg-6 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
        <div class="page-separator">
        <div class="page-separator__text ">Trong ngày</div>
        </div>
            <div class="card m-0">

                <div data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;, &quot;js-lists-values-employee-title&quot;]" class="table-responsive">
                    <table class="table table-flush">
                        <thead>
                            <tr>
                            <th><a>STT</a></th>
                                <th><a>Ảnh</a></th>
                                <th>
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-name">Địa Điểm</a>
                                </th>
                                <th>
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-title">Thời Gian</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        <?php
                            $begin=$time_one_people->time_people_begin($timezone);
                            $end=$time_one_people->time_people_end($timezone);
                            $in_time_stamp=$time_one_people->getCheckinByPlaceIdInTimestamp($begin,$end);
                            $time_one_people->bang_one_people($in_time_stamp,$timezone);
                          
                        ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        
        </div>
    </div>
    <div class="card-group-row__col">
        <div class=" card-body mb-0 col-lg-5 card-group-row__card">
        <div class="page-separator">
        <form action="#" method="POST">
        <div class="page-separator__text ">Chọn ngày xem</div>
    </div>
    <input type="hidden"
    data-toggle="flatpickr"
    data-flatpickr-mode="range"
    data-flatpickr-inline="true"
    value="<?php  $a=date('Y-m-d');echo $a.' to '.$a;?>"
    name="Chon_ngay">
    <input type="submit" class="btn btn-accent btn-rounded" name="tim" value="Tìm kiếm"style="width: 100%;">
        </form>

    </div>
    <div class=" col-lg-7 d-flex align-items-center card-group-row__col" style="margin: 24px 0;">
        <div class="flex" style="max-width: 100%">
        <div class="page-separator">
        <div class="page-separator__text ">Trong ngày chọn</div>
        </div>
            <div class="card m-0" style="min-height: 352px;">

                <div data-toggle="lists" data-lists-values="[&quot;js-lists-values-employee-name&quot;, &quot;js-lists-values-employee-title&quot;]" class="table-responsive">
                    <table class="table table-flush">
                        <thead>
                            <tr>
                                <th><a>STT</a></th>
                                <th><a>Ảnh</a></th>
                                <th>
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-name">Địa Điểm</a>
                                </th>
                                <th>
                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-title">Thời Gian</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        <?php
                        if(isset($_POST['Chon_ngay'])&&$_GET['id']){
                            $time=$_POST['Chon_ngay'];
                            $count = strlen($time);
                            if($count==24){
                                $begin1=str_replace("-", "/", substr($time,0,10));
                                $end1 =str_replace("-", "/", substr($time,14));

                            }
                            elseif($count==10){
                                $begin1=str_replace("-", "/",substr($time,0,10) );
                                $end1=str_replace("-", "/", substr($time,0,10));
                            }
                            $begin2=$time_one_people->time_people_begin1($begin1);
                            $end2=$time_one_people->time_people_end1($end1);
                            $in_time_stamp=$time_one_people->getCheckinByPlaceIdInTimestamp($begin2,$end2);
                            $time_one_people->bang_one_people($in_time_stamp,$timezone);

                        }
                        else{
                            echo'<td colspan="4"
                            style="font-size: 23px;color: burlywood;text-align: center;font-family: monospace;">Hãy chọn ngày để xem thông tin</td>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        
        </div>

    </div>

</div>
    </div>
    </div>
</div>


<?php include 'body_js.php';?>