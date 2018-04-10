<?php
  include "predefines.php";
  $access=true;
  $lines=file("inclusions.init");
  foreach($lines as $incl) if(trim($incl)) include $incl;
  $settings=read_json_file("config.json");
  include 'auth.php';
  logon();
  foreach($settings->command_library as $c){
    if($_GET['command']==$c->alias){
      include $c->filepath;
      die();
    }
  }
?>
