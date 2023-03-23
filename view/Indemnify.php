<?php 
include  'head.php'; 
include  '../config/sql.php';
include '../config/function.php';?>



                <!-- // END Header -->

                <div class="border-bottom-2 py-32pt position-relative z-1">
                    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                        <div class="flex d-flex flex-column flex-sm-row align-items-center">

                            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                <h2 class="mb-0">Account</h2>

                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>

                                    <li class="breadcrumb-item">

                                        <a href="">Account</a>

                                    </li>

                                    <li class="breadcrumb-item active">

                                        Edit Account

                                    </li>

                                </ol>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid page__container">
                    
                        <form action="../api/more/more_timekeeping.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-9 pr-lg-0">

                                <div class="page-section">
                                    <h4>Cấm công</h4>
                                    <!-- 361-371 -->
                                    <div class="list-group list-group-form">
                                        <div class="list-group-item">                                 
                                        <div class="form-group row align-items-center mb-0">
                                                    <label class="form-label col-form-label col-sm-3">Thời gian đến</label>
                                                    <div class="col-sm-9">
                                                        <input type="time"
                                                               class="form-control"
                                                               name="Time_den"
                                                               >
                                                    </div>
                                                </div>
                                                <div class="form-group row align-items-center mb-0">
                                                    <label class="form-label col-form-label col-sm-3">Thời gian về</label>
                                                    <div class="col-sm-9">
                                                        <input type="time"
                                                               class="form-control"
                                                               name="Time_out"
                                                               >
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
                                                name="luu">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


<?php 
include 'body_js.php';?>
 