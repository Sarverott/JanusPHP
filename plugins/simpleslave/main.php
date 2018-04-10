<?php
  if(!isset($_GET['pin'])||!isset($_GET['state'])){
    echo '{"status":"error","error":"missing_args"}';
  }elseif(!is_numeric($_GET['pin'])||!($_GET['state']=="low"||$_GET['state']=="high")){
    echo '{"status":"error","error":"wrong_syntax"}';
  }else{
    $cnfg_data=read_json_file(".\\plugins\\simpleslave\\config.json");
    if(in_array($_GET['pin'], $cnfg_data->allowedports)){
      $reto=array();
      $out=0;
      exec(('python "'.SYSTEM_CORE_LOCATION_WIN.'plugins\\simpleslave\\simpleslave-connector.py" '.$_GET['pin'].' '.$_GET['state']), $reto, $out);
      //echo "<pre>";
      //var_dump($reto);
      //var_dump($out);
      //echo "</pre>";
      echo '{"status":"ok","executed":{"pin":'.$_GET['pin'].',"state":"'.$_GET['state'].'"}}';
    }else{
		  echo '{"status":"error","error":{"pin":'.$_GET['pin'].',"state":"'.$_GET['state'].'"}}';
	  }
  }
?>
