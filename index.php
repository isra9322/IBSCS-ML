<?php
include 'inc/sess.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (Session::get('roleid') == '2'){
  header('Location:index3.php');
}
elseif(Session::get('roleid') == '4'){
  Session::destroy();
}
elseif(Session::get('roleid') == '3'){
  Session::destroy();
}
elseif(Session::get('roleid') == '1'){

   header('Location:dash.php');
}
?>