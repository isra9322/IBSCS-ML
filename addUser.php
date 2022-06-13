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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a><a class="nav-link active" href="#"><i class="far fa-building"></i><span><strong>Institutions</strong></span></a>
                        <a
                            class="nav-link active" href="user_list.php"><i class="fas fa-user-alt"></i><span>Personal Users</span></a><a class="nav-link active" href="user_list.php"><i class="fas fa-user-friends"></i><span>All Users</span></a></li>
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
$sId =  Session::get('roleid');
if ($sId === '1'||$sId ==='2') { ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {
    if($_POST['nameofins'])==''){
    $userAdd = $users->addNewUserByAdmin($_POST);
}
else if($_POST['nameofins'])!=''){
    $userAdd = $users->addNewInsByAdmin($_POST);
}
  
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Add New User<a href="index.php" class="btn btn-primary" style="margin-right: 5px; float: right;">Back</a></h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                  <label for="name">Your name</label>
                  <input type="text" name="name"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="username">Your username</label>
                  <input type="text" name="username"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="username">User type</label>
                  
                                     <script type="text/javascript">
                    function CheckColors(val){
                     var element=document.getElementById('color');
                     if(val=='2')
                       element.style.display='block';
                     else  
                       element.style.display='none';
                    }

                    </script> 
                    </head>
                    <body>
                      <select name="color" class="form-control" onchange='CheckColors(this.value);'> 
                        <option value="1">Personal</option>
                        <option value="2">Institiution</option>
                      </select>
                    <input type="text" class="form-control" name="nameofins" placeholder="Name of the nstitiution" id="color" style='display:none;'/>
                                    <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile Number</label>
                  <input type="text" name="mobile"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <div class="form-group">
      
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="addUser" class="btn btn-success">ADD</button>
                </div>


            </form>
          </div>


        </div>
      </div>

<?php
}else{

  header('Location:index.php');



}
 ?>

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
