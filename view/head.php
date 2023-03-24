<!DOCTYPE html>
<html lang="en"
dir="ltr">
<?php
      include_once 'login/login.php';
?>
<head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible"
      content="IE=edge">
      <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Chấm Công</title>
      
      <!-- Prevent the demo from appearing in search engines -->
      <meta name="robots"
      content="noindex">
      
            
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="assets/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="assets/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="assets/vendor/spinkit.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/preloader.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="assets/css/app.css"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="assets/css/dark-mode.css"
              rel="stylesheet">

        <!-- Flatpickr -->
        <link type="text/css"
              href="assets/css/flatpickr.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/flatpickr-airbnb.css"
              rel="stylesheet">
      <link type="text.css"
      href="assets/css/css.css"
      rel="stylesheet">
       <!-- Select2 -->

        <link type="text/css"
              href="assets/css/select2.css"
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

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
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
    <a href="index.html"
       class="navbar-brand mr-16pt d-lg-none">
        <img class="navbar-brand-icon mr-0 mr-lg-8pt"
             src="assets/images/logo/accent-teal-100@2x.png"
             width="32"
             alt="Huma">
        <span class="d-none d-lg-block">Thái Hưng</span>
    </a>

    <!-- <button class="btn navbar-btn mr-16pt" data-toggle="modal" data-target="#apps">Apps <i class="material-icons">arrow_drop_down</i></button> -->


    <div class="flex"></div>

    <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
        <div class="nav-item dropdown d-none d-sm-flex">
            <a href="#"
               class="nav-link d-flex align-items-center dropdown-toggle"
               data-toggle="dropdown">
                <img width="32"
                     height="32"
                     class="rounded-circle mr-8pt"
                     src="assets/images/people/50/guy-3.jpg"
                     alt="account" />
                <span class="flex d-flex flex-column mr-8pt">
                    <span class="navbar-text-100">Laza Bogdan</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header"><strong>Account</strong></div>
                <a class="dropdown-item"
                   href="../login.php">Logout</a>
            </div>
        </div>
    </div>



</div>