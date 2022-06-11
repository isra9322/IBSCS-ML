<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (Session::get('roleid') == '2'){
  header('Location:index3.php');
}
elseif(Session::get('roleid') == '4'){
  header('Location:index2.php');
}
elseif(Session::get('roleid') == '3'){
  Session::destroy();
}
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
  $deactive = $_GET['deactive'];
  $deactiveId = $users->insDeactiveByAdmin($deactive);
}

if (isset($deactiveId)) {
  echo $deactiveId;
}
if (isset($_GET['active'])) {
  $active = $_GET['active'];
  $activeId = $users->insactiveByAdmin($active);
}

if (isset($activeId)) {
  echo $activeId;
}


 ?>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-users mr-2"></i>Institution list <span class="float-right">Welcome! <strong>
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
                      <th  class="text-center">ph number</th>
                      <th  class="text-center">Status</th>
                      <th  class="text-center">Ex date</th>
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->listins();

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
                          <?php 
                          echo "<span class='badge badge-lg badge-dark text-white'>InsAddmin</span>";
                      
                        ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->phno; ?></span></td>
                        <td>
                          <?php if ($value->stutes == '0') { ?>
                          <span class="badge badge-lg badge-info text-white">Active</span>
                        <?php }else{ ?>
                    <span class="badge badge-lg badge-danger text-white">Deactive</span>
                        <?php } ?>

                        </td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->exdate);  ?></span></td>

                        <td>
                          <?php if ( Session::get("roleid") == '1') {?>
                            <a class="btn btn-success btn-sm
                            " href="index3.php">View</a>
                            <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                            <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>

                             <?php if ($value->stutes == '0') {  ?>
                               <a onclick="return confirm('Are you sure To Deactive ?')" class="btn btn-warning
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?deactive=<?php echo $value->nameofins;?>">Disable</a>
                             <?php } elseif($value->stutes == '1'){?>
                               <a onclick="return confirm('Are you sure To Active ?')" class="btn btn-secondary
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?active=<?php echo $value->nameofins;?>">Active</a>
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



  <?php
  include 'inc/footer.php';

  ?>
