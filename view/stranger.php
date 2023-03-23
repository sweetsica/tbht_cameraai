<?php include "head.php";
    include "../config/sql.php";
    include "../config/function.php";?>
<link rel="stylesheet" href="assets/css/css.css">


<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Người Lạ</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>

                    <li class="breadcrumb-item active">

                        Người Lạ

                    </li>

                </ol>

            </div>


        </div>


    </div>
</div>

<div class="container-fluid page__container page__container page-section">

    

    <div class="page-separator">
        <div class="page-separator__text">Thông tin</div>
    </div>
    <!-- <div class="row card-group-row mb-lg-8pt">

    </div> -->
    <div class="page-section bg-alt border-top-2">
                    <div class="container-fluid page__container page__container">

                        <div class="row">
                        <?php
                            include_once '../model/class_stranger.php';
                            $stranger= new stranger;
                            $data=$stranger->data();
                            $stranger->board_stranger($data)
                        ?>
                            
                        </div>
                    </div>
                </div>
</div>


<?php include 'body_js.php';?>