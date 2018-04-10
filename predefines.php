<?php
header("Content-type: application/json; charset=utf-8");
  function read_json_file($path){
    return json_decode(implode("",file($path)));
  }
  define("SYSTEM_MAIN_DOMAIN", $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/");
  define("SYSTEM_CORE_LOCATION_LNX", $_SERVER['DOCUMENT_ROOT'].substr($_SERVER['SCRIPT_NAME'], 1, strrpos($_SERVER['SCRIPT_NAME'], "/")));
  define("SYSTEM_CORE_LOCATION_WIN", str_replace("/", "\\", SYSTEM_CORE_LOCATION_LNX));
?>
