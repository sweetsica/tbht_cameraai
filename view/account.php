<?php include "head.php";
    include "../config/sql.php";
    include "../config/function.php";?>
<link rel="stylesheet" href="assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="../index.html">Trang chủ</a></li>

                    <li class="breadcrumb-item active">

                        Nhân Viên

                    </li>

                </ol>

            </div>


        </div>

        <div class="row"
             role="tablist">
            <div class="col-auto border-left">
                <a href="time_one_people.php?id=<?php echo $_GET['id'];?>"
                   class="btn btn-accent">Xem Chấm Công</a>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid page__container page__container page-section">

    

    <div class="page-separator">
        <div class="page-separator__text">Thông tin</div>
    </div>
    <div class="row card-group-row mb-lg-8pt">
    <div class="card mb-0 col-md-10 col-sm">

        <div class="table-responsive"
             data-toggle="lists"
             data-lists-sort-by="js-lists-values-employee-name"
             data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>
            <div class="list-group list-group-form">
            <?php

$sql=mysqli_query($conn,"SELECT * from user Where id=".$_GET['id']."");
if(mysqli_num_rows($sql)>0){
                while($display=mysqli_fetch_assoc($sql)){
                    echo'
                    <div class="list-group-item">
                        <div class="form-group row align-items-center mb-0">
                            <label class="form-label col-form-label col-sm-3">Mã Nhân Viên</label>
                            <div class="col-sm-9">
                                <h2>'.$display['id'].'</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-group row align-items-center mb-0">
                            <label class="form-label col-form-label col-sm-3">Họ và tên</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="'.$display['fullname'].'" placeholder="Ghi họ và tên">
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-group row align-items-center mb-0">
                            <label class="form-label col-form-label col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="'.$display['email'].'" placeholder="Ghi email">
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="form-group row align-items-center mb-0">
                            <label class="form-label col-form-label col-sm-3">Ngày sinh</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" value="'.$display['date_birth'].'">
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                    <div class="form-group row align-items-center mb-0">
                        <label class="form-label col-form-label col-sm-3">Ngày vào</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" value="'.$display['date_job_receive'].'">
                        </div>
                    </div>
                </div>
                <div class="list-group-item">
                <div class="form-group row align-items-center mb-0">
                    <label class="form-label col-form-label col-sm-3">Vai Trò</label>
                    <div class="col-sm-9">
                    <select id="cars" value="'.$display['role'].'">
                    <option value="1">Admin</option>
                    <option value="2">Quản lý</option>
                    <option value="3">Nhân Viên</option>
                  </select>
                    </div>
                    
                </div>
            </div>
                    '
                    ;
                    
                }
            }
            else{
               echo' <p>Lỗi ID nhân viên không tồn tại</p>';
            }
                                    ?>
                                    </div>            
        </div>

        <!-- <div class="card-body bordet-top text-right">
15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
</div> -->
    </div>
    </div>
</div>


<?php include 'body_js.php';?>