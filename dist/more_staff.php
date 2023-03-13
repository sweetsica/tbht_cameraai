<?php 
include  'view/head.php'; 
include 'config/sql.php' ;
include 'config/function.php' ;
?>



                <!-- // END Header -->

                <div class="border-bottom-2 py-32pt position-relative z-1">
                    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                        <div class="flex d-flex flex-column flex-sm-row align-items-center">

                            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                <h2 class="mb-0">Thêm Thông Tin </h2>

                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Thêm nhân viên</li>
                                </ol>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid page__container">
                    
                        <form action="api/them/nhan_vien.php" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-9 pr-lg-0">

                                <div class="page-section">
                                    <h4>Thêm nhân viên</h4>
                                    <!-- 361-371 -->
                                    <div class="page-nav__content">
                                        <a class="btn btn-accent"
                                        style="margin-left: 80%; margin-top: -85px;"
                                        href="api/nhan_vien/update_hanet.php">Cập Nhật Nhân Viên từ Hanet</a>
                                    </div>
                                        <?php
                                            include_once ('model/class_more_staff.php');
                                            include_once('config/db.php');
                                            // $more_staff = new more_staff();
                                            
                                        ?>
                                    <div class="list-group list-group-form">
                                        <div class="list-group-item">
                                            <div class="form-group row align-items-center mb-0">
                                            <label class="form-label col-form-label col-sm-3" for="select04">Chọn Phòng Ban</label>
                                                <div class="col-sm-9">
                                                <select id="select04"
                                                        data-toggle="select"
                                                        multiple
                                                        class="form-control form-control-lg" name="list_room">
                                                        <?php
                                                         $db=new db();
                                                         $connect=$db->connect();
                                                         $more_staff=new more_staff($connect);
                                                        $more_staff->company() ; 
                                                        ?> 
                                                </select>
                                                </div>

                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Mã nhân viên</label>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="id"
                                                           placeholder="Mã Nhân Viên">
                                                </div>

                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Tên nhân viên</label>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="user"
                                                           placeholder="Tên Nhân Viên">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Email liên hệ</label>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="email"
                                                           placeholder="email liên hệ Nhân Viên">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Ngày Sinh</label>
                                                <div class="col-sm-9">
                                                    <input type="date"
                                                           class="form-control"
                                                           name="year"
                                                           placeholder="Ngày Sinh Nhân Viên"
                                                           va>
                                                </div>
                                            </div>
                                                           <?php
                                                           date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                           $day= date('Y-m-d');?>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Ngày nhân viên vào </label>
                                                <div class="col-sm-9">
                                                    <input type="date"
                                                           class="form-control"
                                                           name="day_vao"
                                                           value="
                                                           <?php
                                                           echo "$day";
                                                           ?>"
                                                           placeholder="<?php echo $day;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Vai trò công ty </label>
                                                <div class="col-auto">
                                                    <select name="role" id=""
                                                    class="form-control custom-select">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Quản lý</option>
                                                        <option value="3">Nhân Viên</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Ngày nhân viên vào </label>
                                                <div class="col-sm-9">
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           accept="image/jpeg, image/png,image/jpg">
                                                </div>
                                                <p>
                                                    <?php
                                                    $more_staff->input_staff();
                                                   ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>
                            <div class="col-lg-3 page-nav">

                                <div class="page-section pt-lg-112pt">
                                    <div class="page-nav__content">
                                        <button type="submit"
                                                class="btn btn-accent"
                                                name="luu">Lưu lại thông tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


<?php 

include 'view/body_js.php';?>
 