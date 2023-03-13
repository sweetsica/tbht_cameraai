<?php 
include  'view/head.php'; 
include  'config/sql.php';
include 'config/function.php';?>


                <!-- // END Header -->

                <div class="border-bottom-2 py-32pt position-relative z-1">
                    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                        <div class="flex d-flex flex-column flex-sm-row align-items-center">

                            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                <h2 class="mb-0">Thêm Thông Tin</h2>

                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                                    <li class="breadcrumb-item active">

                                       Thêm phòng

                                    </li>

                                </ol>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid page__container">
                    
                        <form action="api/them/more_room.php" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-9 pr-lg-0">

                                <div class="page-section">
                                    <h4>Thêm phòng </h4>
                                    <!-- 361-371 -->
                                    <div class="list-group list-group-form">
                                        <div class="list-group-item">
                                        <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Công ty</label>
                                                <div class="col-auto">
                                                    <select name='ban2' data-toggle="select"
                                                    class="form-control form-control-lg" >
                                                    <?php 
                                                        $sql=mysqli_query($conn,company());
                                                        while($hien=mysqli_fetch_assoc($sql)){
                                                            echo "<option value='".$hien['id']."'>".$hien['name_company']."</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                    <?php
                                                        
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center mb-0">
                                                <label class="form-label col-form-label col-sm-3">Tên phòng</label>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           name="name_room"
                                                           placeholder="Nhập tên phòng">
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
                                                name="luu">Lưu tên phòng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


<?php 
include 'view/body_js.php';?>
 