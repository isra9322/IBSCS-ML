<?php
include 'inc/hd.php';
if(Session::get('roleid') != '1'){
  Session::destroy();
  header('Location:login.php');
}
?>
<!DOCTYPE html >
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" >
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-spa"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>IBSCFSUML</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                 <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link active" href="institiution.php"><i class="far fa-building"></i><span><strong>Institutions</strong></span></a>
                        <a
                            class="nav-link active" href="personal.php"><i class="fas fa-user-alt"></i><span>Personal Users</span></a><a class="nav-link active" href="allusers.php"><i class="fas fa-user-friends"></i><span>All Users</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                      





        </div>
        <?php
Session::CheckSession();
 ?>
 <?php

 if (isset($_GET['id'])) {
   $userid = (int)$_GET['id'];

 }



 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])) {
  if($users->CheckOldPassword($_POST))
    $changePass = $users->changePasswordBysingelUserId($userid, $_POST);
  else 
    {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Password missmacthed !</div>';
          return $msg;
        }
 }



 if (isset( $changePass)) {
   echo  $changePass;
 }
  ?>


 <div class="card ">
   <div class="card-header">
          <h3>Change your password <span class="float-right"> <a href="profile.php?id=<?php  ?>" class="btn btn-primary">Back</a> </h3>
        </div>
        <div class="card-body">



          <div style="width:600px; margin:0px auto">

          <form class="" action="" method="POST">
              <div class="form-group">
                <label for="old_password">New Password</label>
                <input type="password" name="old_password"  class="form-control">
              </div>
              <div class="form-group">
                <label for="new_password">Confirem New Password</label>
                <input type="password" name="new_password"  class="form-control">
              </div>


              <div class="form-group">
                <button type="submit" name="changepass" class="btn btn-success">Change password</button>
              </div>


          </form>
        </div>


      </div>
    </div>











        </div>
      </div>




      </div>



 

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xl-3 mb-4">
                           
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>



