<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="view/assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="view/assets/css/material-icons.css"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="view/assets/css/fontawesome.css"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="view/assets/vendor/spinkit.css"
              rel="stylesheet">
        <link type="text/css"
              href="view/assets/css/preloader.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="view/assets/css/app.css"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="view/assets/css/dark-mode.css"
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

                <img src="view/assets/images/logo/logo.ce9b9fd469a78edee9b2.png" alt="logo Thái Hưng" style="width: 20%;margin: 57px auto;">
                <div class=" pt-32pt pt-sm-64pt pb-32pt">
                    <div class="container-fluid page__container">
                        <form action="#" method="POST" enctype="multipart/form-data"
                              class="col-md-5 p-0 mx-auto"  >
                            <div class="form-group">
                                <label class="form-label"
                                       for="email">Email:</label>
                                <input id="email"
                                       type="text"
                                       class="form-control"
                                       placeholder="Nhập email của bạn ..."
                                       name="email">
                              <p><?php
                                    include_once('view/view/login/login_company.php');
                                    include_once('view/config/db.php');   
                                    $db=new db();
                                    $connect=$db->connect();
                                    $login=new login($connect);
                                    $em=1;
                                    if(isset($_POST['email'])){
                                          $email=$_POST['email'];
                                    $login->email($email);
                                    // $em=0;
                                    }
                              ?></p>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="password">Mật Khẩu:</label>
                                <input id="password"
                                       type="password"
                                       class="form-control"
                                       placeholder="Nhập mật khẩu của bạn ..."
                                       name="pass">
                                       <p><?php
                                       $pa=1;
                                     if(isset($_POST['pass'])){
                                          $pass=$_POST['pass'];
                                    $login->pass($pass);      
                                    //    $pa=0;   
                              }                              
                              ?></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-accent"  style="width: 30%;" name="login">Đăng nhập</button>
                                <?php
                                    if(isset($_POST['login'])){
                                          $pass=$_POST['pass'];
                                          $email=$_POST['email'];
                                          echo $pass.$email;
                                          $login->login1($pass,$email);
                                          var_dump($login->login1($pass,$email));
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
            <!-- // END drawer-layout__content -->


            <!-- // END drawer -->
        </div>
        <!-- // END drawer-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="app"
                          :layout-location="{
      'compact': 'compact-login.html',
      'mini': 'mini-login.html',
      'app': 'login.html',
      'boxed': 'boxed-login.html',
      'sticky': 'sticky-login.html',
      'default': 'fixed-login.html'
    }"
                          sidebar-type="light"
                          sidebar-variant="bg-body"></app-settings>
        </div>
        <!-- jQuery -->
        <script src="view/assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="view/assets/vendor/popper.min.js"></script>
        <script src="view/assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="view/assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="view/assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="view/assets/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="view/assets/js/app.js"></script>

        <!-- Highlight.js -->
        <script src="view/assets/js/hljs.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="view/assets/js/app-settings.js"></script>
    </body>

</html>