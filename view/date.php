<?php include "head.php";?>
<link type="text.css"
      href="assets/css/css.css"
      rel="stylesheet">
<?php include "../config/sql.php";
include "../config/function.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
                $dateday=date('d');
                $datetime=date('H:i');
                $dateMonth=date('m');
                $dateYear=date('Y');
                $datedaysql=date('Y-m-d');
                $dateactually=date('Y-m-d');
                $dateMonthYear=date('m-Y');
?>



<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Chấm Công Trong <?php echo $dateMonthYear;?></h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="../index.html">Trang chủ</li>

                    <li class="breadcrumb-item active">

                        Chấm Công
                    </li>

                </ol>

            </div>
           

        </div>
        <div>
                <table border="0" class="bang_note" style="border: 0;margin-right: 102px;">
                    <tr>
                        <td>Các chú ý: </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="background-color: orangered;border-radius: 44px;">

                        </td>
                        <td> Nhân viên nghỉ không đi làm </td>
                    </tr>
                    <tr>
                        <td style="background-color:firebrick ;border-radius: 44px;"></td>
                        <td>Nhân viên đi muộn</td>
                    </tr>
                    <tr>
                        <td style="background-color: green ;border-radius: 44px;"></td>
                        <td>Nhân viên đi đúng giờ</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>

    </div>
</div>

<div class="container-fluid page__container page__container page-section">
<?php

               include_once('../model/class_date.php');
               include_once('../config/db.php');
               $db=new db();
               $connect=$db->connect();
                $date=new date($connect);
                $date->Month($dateMonth,$dateYear);
                $Month=$date->Month($dateMonth,$dateYear);
                    ?>
    

    <div class="page-separator">
        <div class="page-separator__text">Tháng <?php $dateMonth?></div>
    </div>

    <div class="card mb-0">

        <div class="table-responsive"
             data-toggle="lists"
             data-lists-sort-by="js-lists-values-employee-name"
             data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>


            <table class="table table-bordered table-flush mb-0 thead-border-top-0 table-nowrap">
                                <thead>
                                    <tr>



                                        <th class="border-left-0">
                                            <a href="javascript:void(0)" class="sort asc" data-sort="js-lists-values-employer-name">Name</a>                                        </th>
                                        <div style=font-size:10px;">
                                        <?php
                                        
                                        $date->calendar($Month,$dateMonth,$dateYear);
                                        ?></div>
                                        <th style="width: 24px;"></th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="contacts">
                                    <?php
                                   $date-> table($Month,$dateYear,$dateMonth,$dateactually);
                                    ?>
                                        </form>
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
                    <div class="dropdown-menu">
                        <a href=""
                           class="dropdown-item active">1</a>

                    </div>
                </li>
               
            </ul>

        </div>
        <!-- <div class="card-body bordet-top text-right">
15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
</div> -->

    </div>

</div>


<?php include 'body_js.php';?>