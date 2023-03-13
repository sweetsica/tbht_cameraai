<?php
session_status();
if(!isset($_GET['code'])){
        header('Location: login.php');
        echo 'ok';
        exit;
}
if(!isset($_SESSION['access_token'])){
    echo "<script>sessionStorage.setItem('code', '".$_GET['code']."');</script>";
    header('Location: dist/api/token.php');
}
else{
}
?>
<!DOCTYPE html>
<html lang="en"
dir="ltr">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible"
      content="IE=edge">
      <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Dashboard</title>
      
      <!-- Prevent the demo from appearing in search engines -->
      <meta name="robots"
      content="noindex">
      
            
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="dist/assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="dist/assets/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="dist/assets/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="dist/assets/vendor/spinkit.css"
              rel="stylesheet">
        <link type="text/css"
              href="dist/assets/css/preloader.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="dist/assets/css/app.css"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="dist/assets/css/dark-mode.css"
              rel="stylesheet">

        <!-- Flatpickr -->
        <link type="text/css"
              href="dist/assets/css/flatpickr.css"
              rel="stylesheet">
        <link type="text/css"
              href="dist/assets/css/flatpickr-airbnb.css"
              rel="stylesheet">
      <link type="text.css"
      href="dist/assets/css/css.css"
      rel="stylesheet"> 
    </head>

    <body class="layout-app layout-sticky-subnav ">

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

            <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

           
        </div>

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
<link rel="stylesheet" href="dist/assets/css/css.css">
<div class="mdk-drawer-layout__content page-content">

<!-- Header -->

<div class="navbar navbar-expand navbar-shadow px-0  pl-lg-16pt navbar-light bg-body"
     id="default-navbar"
     data-primary>

    <!-- Navbar toggler -->
    <button class="navbar-toggler d-block d-lg-none rounded-0"
            type="button"
            data-toggle="sidebar">
        <span class="material-icons">menu</span>
    </button>

    <!-- Navbar Brand -->
    <a href="index.php"
       class="navbar-brand mr-16pt d-lg-none">
        <img class="navbar-brand-icon mr-0 mr-lg-8pt"
             src="dist/assets/images/logo/accent-teal-100@2x.png"
             width="32"
             alt="Huma">
        <span class="d-none d-lg-block">Thái Hưng</span>
    </a>

    <!-- <button class="btn navbar-btn mr-16pt" data-toggle="modal" data-target="#apps">Apps <i class="material-icons">arrow_drop_down</i></button> -->

    <form class="search-form navbar-search d-none d-md-flex mr-16pt"
          action="index.php">
        <button class="btn"
                type="submit"><i class="material-icons">search</i></button>
        <input type="text"
               class="form-control"
               placeholder="Search ...">
    </form>

    <div class="flex"></div>

    <div class="nav navbar-nav flex-nowrap d-none d-lg-flex mr-16pt"
         style="white-space: nowrap;">
        <div class="nav-item dropdown d-none d-sm-flex">
            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown">EN</a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header"><strong>Select language</strong></div>
                <a class="dropdown-item active"
                   href="">English</a>
                <a class="dropdown-item"
                   href="">French</a>
                <a class="dropdown-item"
                   href="">Romanian</a>
                <a class="dropdown-item"
                   href="">Spanish</a>
            </div>
        </div>
    </div>

    <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
        <div class="nav-item dropdown d-none d-sm-flex">
            <a href="#"
               class="nav-link d-flex align-items-center dropdown-toggle"
               data-toggle="dropdown">
                <img width="32"
                     height="32"
                     class="rounded-circle mr-8pt"
                     src="dist/assets/images/people/50/guy-3.jpg"
                     alt="account" />
                <span class="flex d-flex flex-column mr-8pt">
                    <span class="navbar-text-100">Laza Bogdan</span>
                    <small class="navbar-text-50">Administrator</small>
                </span>
            </a>
        </div>

        <!-- Notifications dropdown -->
        <div class="nav-item ml-16pt dropdown dropdown-notifications">
            <button class="nav-link btn-flush dropdown-toggle"
                    type="button"
                    data-toggle="dropdown"
                    data-dropdown-disable-document-scroll
                    data-caret="false">
                <i class="material-icons">notifications</i>
                <span class="badge badge-notifications badge-accent">2</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div data-perfect-scrollbar
                     class="position-relative">
                    <div class="dropdown-header"><strong>System notifications</strong></div>
                    <div class="list-group list-group-flush mb-0">

                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action unread">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">3 minutes ago</small>

                                <span class="ml-auto unread-indicator bg-accent"></span>

                            </span>
                            <span class="d-flex">
                                <span class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                    </span>
                                </span>
                                <span class="flex d-flex flex-column">

                                    <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                </span>
                            </span>
                        </a>

                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">5 hours ago</small>

                            </span>
                            <span class="d-flex">
                                <span class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <i class="material-icons font-size-16pt text-primary">group_add</i>
                                    </span>
                                </span>
                                <span class="flex d-flex flex-column">
                                    <strong class="text-black-100">Adrian. D</strong>
                                    <span class="text-black-70">Wants to join your private group.</span>
                                </span>
                            </span>
                        </a>

                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">1 day ago</small>

                            </span>
                            <span class="d-flex">
                                <span class="avatar avatar-xs mr-2">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <i class="material-icons font-size-16pt text-warning">storage</i>
                                    </span>
                                </span>
                                <span class="flex d-flex flex-column">

                                    <span class="text-black-70">Your deploy was successful.</span>
                                </span>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- // END Notifications dropdown -->

        <!-- Notifications dropdown -->
        <div class="nav-item ml-16pt dropdown dropdown-notifications">
            <button class="nav-link btn-flush dropdown-toggle"
                    type="button"
                    data-toggle="dropdown"
                    data-dropdown-disable-document-scroll
                    data-caret="false">
                <i class="material-icons icon-24pt">mail_outline</i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <div data-perfect-scrollbar
                     class="position-relative">
                    <div class="dropdown-header"><strong>Messages</strong></div>
                    <div class="list-group list-group-flush mb-0">

                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action unread">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">5 minutes ago</small>

                                <span class="ml-auto unread-indicator bg-accent"></span>

                            </span>
                            <span class="d-flex">
                                <span class="avatar avatar-xs mr-2">
                                    <img src="dist/assets/images/people/110/woman-5.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle">
                                </span>
                                <span class="flex d-flex flex-column">
                                    <strong class="text-black-100">Michelle</strong>
                                    <span class="text-black-70">Clients loved the new design.</span>
                                </span>
                            </span>
                        </a>

                        <a href="javascript:void(0);"
                           class="list-group-item list-group-item-action">
                            <span class="d-flex align-items-center mb-1">
                                <small class="text-black-50">5 minutes ago</small>

                            </span>
                            <span class="d-flex">
                                <span class="avatar avatar-xs mr-2">
                                    <img src="dist/assets/images/people/110/woman-5.jpg"
                                         alt="people"
                                         class="avatar-img rounded-circle">
                                </span>
                                <span class="flex d-flex flex-column">
                                    <strong class="text-black-100">Michelle</strong>
                                    <span class="text-black-70">🔥 Superb job..</span>
                                </span>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- // END Notifications dropdown -->
    </div>

    <div class="dropdown border-left-2 navbar-border">
        <button class="navbar-toggler navbar-toggler-custom d-block"
                type="button"
                data-toggle="dropdown"
                data-caret="false">
            <span class="material-icons">business_center</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header"><strong>Select company</strong></div>
            <a href=""
               class="dropdown-item active d-flex align-items-center">

                <div class="avatar avatar-sm mr-8pt">

                    <span class="avatar-title rounded bg-primary">FM</span>

                </div>

                <small class="ml-4pt flex">
                    <span class="d-flex flex-column">
                        <strong class="text-black-100">FrontendMatter Inc.</strong>
                        <span class="text-black-50">Administrator</span>
                    </span>
                </small>
            </a>
            <a href=""
               class="dropdown-item d-flex align-items-center">

                <div class="avatar avatar-sm mr-8pt">

                    <span class="avatar-title rounded bg-accent">HH</span>

                </div>

                <small class="ml-4pt flex">
                    <span class="d-flex flex-column">
                        <strong class="text-black-100">HumaHuma Inc.</strong>
                        <span class="text-black-50">Publisher</span>
                    </span>
                </small>
            </a>
        </div>
    </div>

</div>

<!-- // END Header -->

<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Nhân Viên</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item active">

                        Nhân Viên

                    </li>

                </ol>

            </div>


        </div>

        <div class="row"
             role="tablist">
            <div class="col-auto border-left">
                <a href="dist/more_staff.php"
                   class="btn btn-accent">Thêm Nhân Viên</a>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid page__container page__container page-section">

    

    <div class="page-separator">
        <div class="page-separator__text">Employees</div>
    </div>

    <div class="card mb-0">

        <div class="table-responsive"
             data-toggle="lists"
             data-lists-sort-by="js-lists-values-employee-name"
             data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

            <div class="card-header">
                <form class="form-inline">
                    <label class="mr-sm-2 form-label"
                           for="inlineFormFilterBy">Filter by:</label>
                    <input type="text"
                           class="form-control search mb-2 mr-sm-2 mb-sm-0"
                           id="inlineFormFilterBy"
                           placeholder="Search ...">

                    <label class="sr-only"
                           for="inlineFormRole">Role</label>
                    <select id="inlineFormRole"
                            class="custom-select mb-2 mr-sm-2 mb-sm-0">
                        <option value="All Roles">All Roles</option>
                    </select>

                    <div class="ml-auto mb-2 mb-sm-0 custom-control-inline mr-0">
                        <label class="form-label mb-0"
                               for="active">Active</label>
                        <div class="custom-control custom-checkbox-toggle ml-8pt">
                            <input checked=""
                                   type="checkbox"
                                   id="active"
                                   class="custom-control-input">
                            <label class="custom-control-label"
                                   for="active">Active</label>
                        </div>
                    </div>

                </form>
            </div>

             <table class="table mb-0 thead-border-top-0 table-nowrap">
                <thead>
                    <tr>

                        <th style="width: 18px;"
                            class="pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input js-toggle-check-all"
                                       data-target="#staff"
                                       id="customCheckAllstaff">
                                <label class="custom-control-label"
                                       for="customCheckAllstaff"><span class="text-hide">Toggle all</span></label>
                            </div>
                        </th>

                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employer-name">Mã Nhân Viên</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-employee-name">Ngày Sinh</a>
                        </th>


                        <th class="text-center"
                            style="width: 48px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-projects">Ngày vào</a>
                        </th>

                        <th style="width: 37px;">Vai trò</th>

                        <th style="width: 51px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-earnings">Tình trạng</a>
                        </th> 
                        <th style="width: 24px;"
                            class="pl-0"></th>
                    </tr>
                </thead>
                <tbody class="list"
                       id="staff">
                    <?php
                        include "dist/config/sql.php";
                        include "dist/config/function.php";
                        $sql=mysqli_query($conn,"SELECT * From user");
                        $i=0;
                        $data=array();
                        while ($row=mysqli_fetch_array($sql)){
                            $data[]=$row;
                        }
                        $so_dong=10;
                        $tong_dong=ceil(count($data)/$so_dong);
                        $hien_tai=isset($_GET['page']) ? intval($_GET['page']):1;
                        $hien_tai=max(1,min($hien_tai,$tong_dong));
                        $bu_lai=($hien_tai-1)*$so_dong;
                        $dong_hientai= array_slice($data,$bu_lai,$so_dong);
                        foreach($dong_hientai as $data){
                            $logo=substr("".$data[1]."",0,1);
                                if($i>=10){
                                    
                                }
                            echo'
                            <tr>

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input js-check-selected-row"
                                               id="customCheck1_2">
                                        <label class="custom-control-label"
                                               for="customCheck1_2"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>
                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-32pt mr-8pt">

                                            <span class="avatar-title rounded-circle">'.$logo.'</span>

                                        </div>
                                        <div class="media-body">
                                        <a href="account.php?id='.$data[0].'">
                                            <div class="d-flex flex-column">
                                                <p class="mb-0"> <strong class="js-lists-values-employee-name color-name">'.$data[1].'</strong></p>
                                                <small class="js-lists-values-employee-email text-50">'.$data[2].'</small>
                                            </div>
                                        </a>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                           <span class="js-lists-values-employer-name text-70">'.$data[3].'</span>
                                    </div>
                                </td>

                                <td class="text-center js-lists-values-projects small text-70">'.$data[4].'</td>

                                <td>

                                    <a href=""
                                       class="chip chip-outline-secondary">'.$data[6].'</a>

                                </td>
                                <td>
                                <div class="text-center js-lists-values-projects small text-70">';
                                    if(ucwords($data[5])=="Đang Làm"){
                                        echo '
                                        <span style="color:green">'.$data[5].'</span>
                                        ';
                                    }
                                    elseif(ucwords($data[5])=="Đã Nghỉ"){
                                        echo '
                                        <span style="color:red;">'.$data[5].'</span>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <span style="color:blue;">'.$data[5].'</span>
                                        ';
                                    }
                           echo'</div></td>
                            </tr>
                            ';
                            $i++;
                        }
                    ?>



                </tbody>
            </table>
        </div>

        <div class="card-footer p-8pt "'id='hien'>

            <ul class="pagination justify-content-start pagination-xsm m-0">

                <li class="page-item dropdown">
                    <a class="page-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       aria-label="Page">
                        <?php
                        for($i=1;$i<=$tong_dong;$i++){
                            if($i==$hien_tai){
                                echo " <span>$i</span>";
                            } 
                        }
                        ?>
                        
                    </a>
                    <div class="dropdown-menu " >
                        <?php
                            for($i=1;$i<=$tong_dong;$i++){
                                if($i==$hien_tai){
                                    echo "<strong>$i</strong> ";
                                }
                                
                                if($i!=$hien_tai){
                                    echo '<a href="?page='.$i.'"
                                    class="dropdown-item active">'.$i.'</a>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </li>

            </ul>

        </div>

    </div>

</div>
<div class="js-fix-footer footer border-top-2 bottom_duoi" style="
    position: fixed;
    bottom: 0;
    width:100%;
">
    <div class=" page-section d-flex flex-column">
        <p class="text-70 brand mb-20pt">
            <img class="brand-icon"
                 src="dist/assets/images/logo/black-70@2x.png"
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
                               class="nav-link mr-8pt"><img src="dist/assets/images/icon/footer/facebook-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Facebook"></a>
                            <a href="#"
                               class="nav-link mr-8pt"><img src="dist/assets/images/icon/footer/twitter-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Twitter"></a>
                            <a href="#"
                               class="nav-link mr-8pt"><img src="dist/assets/images/icon/footer/vimeo-square@2x.png"
                                     width="24"
                                     height="24"
                                     alt="Vimeo"></a>

                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                        <a href=""
                           class="btn btn-outline-white">English <span class="icon--right material-icons">arrow_drop_down</span></a>
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
<div>
    
</div>
            <!-- // END drawer-layout__content -->

            <!-- drawer -->
<!-- drawer -->
<div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark sidebar-left"
                         data-perfect-scrollbar>

                        <!-- Navbar toggler -->

                        <a href="dist/index.php"
                           class="sidebar-brand ">
                            <img class="sidebar-brand-icon"
                                 src="dist/assets/images/logo/accent-teal-100@2x.png"
                                 alt="Huma">
                            <span>Thái Hưng</span>
                        </a>
                        <div class="sidebar-heading">Overview</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item active">
                            <a class="sidebar-menu-button" data-toggle="collapse" href="#enterprise_menu" aria-expanded="true">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                    Thông Tin 
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse show" id="enterprise_menu" style="">
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="dist/staff.php">
                                            <span class="sidebar-menu-text">Nhân Viên</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="dist/date.php">
                                            <span class="sidebar-menu-text">Chấm Công </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item ">
                                        <a class="sidebar-menu-button" href="dist/timekeeping_in_the_day.php">
                                            <span class="sidebar-menu-text">Nhân Viên Đi Qua Camera</span>
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
                                    while($hien=mysqli_fetch_assoc($sql2)){
                                        $k='';
                                        echo '<li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="dist/company_launch.php?mb='.$hien['id'].'&id=""" >';
                                                if($hien["name_company"]==''){
                                                    $k="vui long thêm tên";
                                                }
                                                else{
                                                    $k=$hien["name_company"];
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
                                        <a class="sidebar-menu-button" href="dist/more_launch.php">
                                            <span class="sidebar-menu-text">Thêm Ban</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="dist/more_room.php">
                                            <span class="sidebar-menu-text">Thêm Phòng</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="dist/more_staff.php">
                                            <span class="sidebar-menu-text">Thêm Nhân Viên</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="dist/themChamcong.php?mb=''&id=''">
                                            <span class="sidebar-menu-text">Thêm Chấm Công</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="dist/more_staff_room.php">
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
      'compact': 'compact-staff.html',
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
        <script src="dist/assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="dist/assets/vendor/popper.min.js"></script>
        <script src="dist/assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="dist/assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="dist/assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="dist/assets/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="dist/assets/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="dist/assets/js/hljs.js"></script>

        <!-- Flatpickr -->
        <script src="dist/assets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="dist/assets/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="dist/assets/js/settings.js"></script>

        <!-- Chart.js -->
        <script src="dist/assets/vendor/Chart.min.js"></script>
        <script src="dist/assets/js/chartjs-rounded-bar.js"></script>
        <script src="dist/assets/js/chartjs.js"></script>

        <!-- Chart.js Samples -->
        <script src="dist/assets/js/page.staff.js"></script>

        <!-- List.js -->
        <script src="dist/assets/vendor/list.min.js"></script>
        <script src="dist/assets/js/list.js"></script>

        <!-- Tables -->
        <script src="dist/assets/js/toggle-check-all.js"></script>
        <script src="dist/assets/js/check-selected-row.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="dist/assets/js/app-settings.js"></script>
    </body>

</html>
