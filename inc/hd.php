<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Session.php";
Session::init();



spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});


$users = new Users();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IBSCFS ML</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">

    <?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  // <strong>Success !</strong> You are Logged Out Successfully !</div>');
  Session::destroy();
}



 ?>

    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
                    <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>IBSCFS ML Admin port</a>
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                              <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
              <li class="nav-item">

                  <a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>system User lists </span></a>
              </li>
              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }

                         ?>">

                
              </li>
            <?php  } ?>
            <?php if (Session::get('roleid') == '2') { ?>
            <a class="nav-link" href="addUsers.php"><i class="fas fa-user-plus mr-2"></i>Add user </span></a>  <?php  } ?>
            <li class="nav-item
            
            <?php


                    $path = $_SERVER['SCRIPT_FILENAME'];
                    $current = basename($path, '.php');
                    if ($current == 'profile') {
                        echo "active ";
                    }

                 ?>

            ">

              <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
          <?php }else{ ?>

              <li class="nav-item

             
                <?php

                                    $path = $_SERVER['SCRIPT_FILENAME'];
                                    $current = basename($path, '.php');
                                    if ($current == 'login') {
                                        echo " active ";
                                    }

                                 ?>">
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
              </li>

          <?php } ?>


          
                           
                    </ul>
            </div>
            </nav>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/theme.js"></script>
    <script id="bs-live-reload" data-sseport="11145" data-lastchange="1654767951676" src="/js/livereload.js"></script>
</body>

</html>