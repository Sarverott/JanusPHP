<?php
  include 'protect.php';
  $currnet_settings=array();
  function logon(){
    global $settings, $current_settings;
    if(isset($_POST['accesskey'])&&trim($_POST['accesskey'])){
      try{
        $auth_data=explode(":",base64_decode($_POST['accesskey']));
        if(count($auth_data)==2){
          $auth_data[0]=sha1($auth_data[0]);
          $auth_data[1]=sha1($auth_data[1]);
          foreach($settings->users as $k=>$u){
            if($auth_data[0]==$u->login&&$auth_data[1]==$u->pass){
              $current_settings['userid']=$k;
              return true;
            }
          }
          throw 'incorrect';
        }else{
          throw 'incorrect';
        }
      }catch(Exception $err ){
        echo '{"status":"error","errorcontent":"access_denined"}';
        die();
      }
    }else{
      echo '{"status":"error","errorcontent":"access_denined"}';
      die();
    }
  }
?>
