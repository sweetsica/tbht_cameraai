<?php include "view/head.php";?>
<?php include "config/sql.php";
include "config/function.php";?>



<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                    <li class="breadcrumb-item active">

                        Cấm Công
                    </li>

                </ol>

            </div>


        </div>


    </div>
</div>

<div class="container-fluid page__container page__container page-section">
<?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $dateday=date('d');
                $datetime=date('H:i');
                $dateMonth=date('m');
                $dateYear=date('Y');
                $datedaysql=date('Y-m-d');
                $dateactually=date('Y-m-d');
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

                                        <th style="width: 18px;" class="pr-0 border-right-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#contacts" id="customCheckAll_contacts" data-domfactory-upgraded="toggle-check-all">
                                                <label class="custom-control-label" for="customCheckAll_contacts"><span class="text-hide">Toggle all</span></label>
                                            </div>
                                        </th>

                                        <th class="border-left-0">
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-name">Name</a>
                                        </th>
                                        <div style=font-size:10px;">
                                        <?php
                                        
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
                                        ?></div>
                                        <th style="width: 24px;"></th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="contacts">
                                    <?php
                                    $sql=mysqli_query($conn,
                                    "SELECT l.date,l.time_now,l.time_out,l.id_belong,n.fullname,p.name_room,l.role FROM timekeeping AS l
                                    left JOIN belong AS t ON t.id=l.id_belong
                                    LEFT JOIN room AS p ON p.id=t.id_room
                                    LEFT JOIN user AS n ON n.id=t.id_staff");
                                    while($hien=mysqli_fetch_assoc($sql)){
                                        $logo=substr("".$hien['fullname']."",0,1);
                                    echo'<tr>

                                        <td class="pr-0 border-right-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_contacts_1" data-domfactory-upgraded="check-selected-row">
                                                <label class="custom-control-label" for="customCheck1_contacts_1"><span class="text-hide">Check</span></label>
                                            </div>
                                        </td>

                                        <td class="border-left-0">

                                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                                <div class="avatar avatar-32pt mr-8pt">

                                                    <span class="avatar-title rounded-circle bg-white border text-100">'.$logo.'</span>

                                                </div>
                                                <div class="media-body ml-4pt">
                                                    
                                                        <p class="mb-0"><strong class="js-lists-values-name">'.$hien['fullname'].'</strong></p>
                                                        ';
                                                        ?>
                                                    
                                                </div>
                                            </div>
                                            
                                        </td>
                                        <?php

                                    for($i=1;$i<$Month;$i++){ 
                                        $date="".$i."-$dateMonth-$dateYear";

                                            $datedaysql=date('Y-m-d',strtotime($date.'+'.$i.'days'));
                                            if($datedaysql==$hien['date']){
                                                $datevn=date("d-m-Y",strtotime($date.'+'.$i.' days'));
                                                
                                                echo'
                                                <td>
                                                <a class="d-flex flex-column border-1 rounded bg-light px-8pt py-4pt lh-1" href="">
                                                <small><strong class="js-lists-values-name text-black-100">'.$hien['role'].'</strong></small>
                                                <small class="text-black-50">'.$hien['time_now'].' - '.$hien['time_out'].'</small>
                                                </a>
                                                
                                                </td>';
                                                
                                            }                                             
                                            else{
                                                echo'<td>';                                                  
                                                    echo '</td>';
                                                }
                                            }
                                                echo'
                                            </tr>';
                                        }
                                    ?>
                                        </form>
                                </tbody>
                            </table>
        </div>

        <div class="card-footer p-8pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="#"
                       aria-label="Previous">
                        <span aria-hidden="true"
                              class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
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
                        <a href=""
                           class="dropdown-item">2</a>
                        <a href=""
                           class="dropdown-item">3</a>
                        <a href=""
                           class="dropdown-item">4</a>
                        <a href=""
                           class="dropdown-item">5</a>
                    </div>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- <div class="card-body bordet-top text-right">
15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
</div> -->

    </div>

</div>


<?php include 'view/body_js.php';?>