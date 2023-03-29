<div class="js-fix-footer footer border-top-2 bottom_duoi" style="
    bottom: 0;
    width:100%;
">
    <div class=" page-section d-flex flex-column">
        <p class="text-70 brand mb-20pt">
            <img class="brand-icon"
                 src="assets/images/logo/black-70@2x.png"
                 width="30"
                 alt="Huma"> Thái hưng
        </p>
    </div>
    <div class="pb-16pt pb-lg-24pt">
        <div class="container-fluid page__container">
            <div class="bg-dark rounded page-section py-lg-32pt px-16pt px-lg-24pt">
                <div class="row">
                    <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                        <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                        <nav class="nav nav-links nav--flush">
                            <a href="#"
                               class="nav-link mr-8pt"><img src="assets/images/icon/footer/facebook-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Facebook"></a>
                            <a href="#"
                               class="nav-link mr-8pt"><img src="assets/images/icon/footer/twitter-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Twitter"></a>
                            <a href="#"
                               class="nav-link mr-8pt"><img src="dassets/images/icon/footer/vimeo-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Vimeo"></a>

                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                      
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                            <a href=""
                               class="text-white-70 text-underline mr-16pt">Terms</a>
                            <a href=""
                               class="text-white-70 text-underline">Privacy policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>    
            <!-- // END drawer-layout__content -->

            <!-- drawer -->
<!-- drawer -->
<div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark sidebar-left"
                         data-perfect-scrollbar>
                        <a href="index.php"
                           class="sidebar-brand ">
                            <img class="sidebar-brand-icon"
                                 src="assets/images/logo/accent-teal-100@2x.png"
                                 alt="Huma">
                            <span>Thái Hưng</span>
                        </a>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#enterprise_menu" aria-expanded="true">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                    Thông Tin 
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse show" id="enterprise_menu" style="">
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="staff.php">
                                            <span class="sidebar-menu-text">Nhân Viên</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="date.php">
                                            <span class="sidebar-menu-text">Chấm Công </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="timekeeping_in_the_day.php">
                                            <span class="sidebar-menu-text">Nhân Viên Qua Camera</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="stranger.php">
                                            <span class="sidebar-menu-text">Người Lạ Qua Camera</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-menu-item open">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#productivity_menu" aria-expanded="false">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">work_outline</span>
                                    Công ty
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse show" id="productivity_menu" style="">
                                    <?php 
                                    echo '
                                    <li class="sidebar-menu-item"
                                    ';
                                    $sql2=mysqli_query($conn,"SELECT * FROM company ORDER BY `level`");
                                    if(mysqli_num_rows($sql2)>0){
                                    while($display=mysqli_fetch_assoc($sql2)){
                                        $k='';
                                        echo '<li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="company_launch.php?mb='.$display['id'].'&id=""" >';
                                                if($display["name_company"]==''){
                                                    $k="vui long thêm tên";
                                                }
                                                else{
                                                    $k=$display["name_company"];
                                                }
                                                    echo '<span class="sidebar-menu-text">'.$k.'</span>';
                                                echo"</a>";
                                   echo' </li>';
                            }}
                                    ?>
                                    </li> 
                                </ul>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" data-toggle="collapse" href="#messaging_menu">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add</span>
                                    Thêm thông tin
                                    <span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto"> </span>
                                    <span class="sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent" id="messaging_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="more_launch.php">
                                            <span class="sidebar-menu-text">Thêm Ban</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="more_room.php">
                                            <span class="sidebar-menu-text">Thêm Phòng</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="more_staff.php">
                                            <span class="sidebar-menu-text">Thêm Nhân Viên</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="more_timekeeping.php?mb=''&id=''">
                                            <span class="sidebar-menu-text">Thêm Chấm Công</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="more_staff_room.php">
                                            <span class="sidebar-menu-text">Thêm Nhân Viên Phòng</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>



                        </ul>

                    </div>
                </div>
            </div>
            <!-- // END drawer -->
            <!-- // END drawer -->
        </div>
        <!-- // END drawer-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="app"
                          :layout-location="{
      
      'mini': 'mini-staff.html',
      'app': 'staff.html',
      'boxed': 'boxed-staff.html',
      'sticky': 'sticky-staff.html',
      'default': 'fixed-staff.html'
    }"
                          sidebar-type="light"
                          sidebar-variant="bg-body"></app-settings>
        </div>
        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="assets/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="assets/js/hljs.js"></script>

        <!-- Flatpickr -->
        <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="assets/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="assets/js/settings.js"></script>

        <!-- Chart.js -->
        <script src="assets/vendor/Chart.min.js"></script>
        <script src="assets/js/chartjs-rounded-bar.js"></script>
        <script src="assets/js/chartjs.js"></script>

        <!-- Chart.js Samples -->
        <script src="assets/js/page.staff.js"></script>

        <!-- List.js -->
        <script src="assets/vendor/list.min.js"></script>
        <script src="assets/js/list.js"></script>

        <!-- Tables -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <!-- Select2 -->
        <!-- <script src="assets/vendor/select2/select2.min.js"></script>
        <script src="assets/js/select2.js"></script> -->

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>
        <script src="assets/js/chartjs1.js"></script>
    </body>

</html>