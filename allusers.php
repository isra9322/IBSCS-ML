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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dash.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link active" href="institiution.php"><i class="far fa-building"></i><span><strong>Institutions</strong></span></a>
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









        </div>
        <?php

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php

if (isset($_GET['remove'])) {
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $removeUser = $users->deleteUserById($remove);
}

if (isset($removeUser)) {
  echo $removeUser;
}
if (isset($_GET['deactive'])) {
  $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
  $deactiveId = $users->userDeactiveByAdmin($deactive);
}

if (isset($deactiveId)) {
  echo $deactiveId;
}
if (isset($_GET['active'])) {
  $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
  $activeId = $users->userActiveByAdmin($active);
}

if (isset($activeId)) {
  echo $activeId;
}


 ?>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$username = Session::get('username');
if (isset($username)) {
  echo $username;
}
 ?></span>

          </strong></span></h3>
        </div>
        <div class="card-header">
          <span class="float-left"> <a href="index.php" class="btn btn-primary">Back</a> 
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">SL</th>
                      <th  class="text-center">Name of institution</th>
                      <th  class="text-center">Username</th>
                      <th  class="text-center">Email address</th>
                      <th  class="text-center">phone number</th>
                      <th  class="text-center">Status</th>
                      <th  class="text-center">EXdate</th>
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->selectAllUserData();

                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;
                          $_SESSION['nameofins']=$value->nameofins;

                     ?>

                      <tr class="text-center"
                      <?php if (Session::get("id") == $value->id) {
                        echo "style='background:#d9edf7' ";
                      } ?>
                      >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->nameofins; ?></td>
                        <td><?php echo $value->username; ?> <br>
                           <?php if ($value->roleid  == '1'){
                          echo "<span class='badge badge-lg badge-info text-white'>Admin</span>";
                        } 
                         elseif($value->roleid=='4')
                          echo "<span class='badge badge-lg badge-dark text-white'>investoer</span>";
                        elseif ($value->roleid == '2') {
          
                           echo "<span class='badge badge-lg badge-dark text-white'>insaddmin</span>";
                        }elseif ($value->roleid == '3') {
                            echo "<span class='badge badge-lg badge-dark text-white'>ins user</span>";
                        } ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->mobile; ?></span></td>
                        <td>
                          <?php if ($value->isActive == '0') { ?>
                          <span class="badge badge-lg badge-info text-white">Active</span>
                        <?php }else{ ?>
                    <span class="badge badge-lg badge-danger text-white">Deactive</span>
                        <?php } ?>

                        </td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->startdate);  ?></span></td>

                        <td>
                          <?php if ( Session::get("roleid") == '1') {?>
                            
                            <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                            <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>

                             <?php if ($value->isActive == '0') {  ?>
                               <a onclick="return confirm('Are you sure To Deactive ?')" class="btn btn-warning
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?deactive=<?php echo $value->id;?>">Disable</a>
                             <?php } elseif($value->isActive == '1'){?>
                               <a onclick="return confirm('Are you sure To Active ?')" class="btn btn-secondary
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?active=<?php echo $value->id;?>">Active</a>
                             <?php } ?>




                        <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php  }elseif( Session::get("roleid") == '2'){ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }else{ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>

                        <?php } ?>

                        </td>
                      </tr>
                    <?php }}else{ ?>
                      <tr class="text-center">
                      <td>No user availabe now !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>









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

