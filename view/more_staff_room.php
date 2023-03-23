<?php 
include  'head.php'; 
include  '../config/sql.php';
include '../config/function.php';?>


                <!-- // END Header -->

                <div class="border-bottom-2 py-32pt position-relative z-1">
                    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                        <div class="flex d-flex flex-column flex-sm-row align-items-center">

                            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                <h2 class="mb-0">Thêm Thông Tin</h2>

                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="../index.php">Trang Chủ</a></li>

                                    <li class="breadcrumb-item active">

                                    Thêm nhân viên vào phòng ban

                                    </li>
                                    
                                </ol>
                               
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid page__container">
                    
                        <form action="../api/more/more_belong.php" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-9 pr-lg-0">

                                <div class="page-section">
                                    <h4>Thêm nhân viên vào phòng ban</h4>
                                    <div class="page-nav__content">
                                            <a class="btn btn-accent"
                                            style="margin-left: 80%; margin-top: -85px;"
                                            href="api/belong/update_hanet.php">Cập Nhật Nhân Viên Thuộc Phòng từ Hanet</a>
                                        </div>
                                    <!-- 361-371 -->
                                    <form action="../api/belong/create.php" method="POST" enctype="multipart/form-data">
                                    <div class="list-group list-group-form">
                                        <div class="list-group-item">
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Chọn tên ban</label>
                                                <div class="col-sm-9">
                                                   <?php echo phong_ban();?>
                                                </div>
                                                <label class="form-label col-form-label col-sm-3">Chọn tên nhân viên</label>
                                                <div class="col-sm-9">
                                                   <?php echo tennv();?>
                                                </div>
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
                                                name="luu">Lưu tên Công Ty</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </form>
                </div>


<?php 

include 'body_js.php';?>