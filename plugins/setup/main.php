<?php
  /*class user{
    public function __construct($name, $password){
      $this->login=$name;
      $this->pass=$password;
    }
    public $login;
    public $pass;
  }
  class settings{
    public function delete_user(){

    }
    public function add_user(){

    }
  }*/
  $users_provigiles=[];
  include "provigiles.php";
  switch($_GET['section']){
    case "users":
      switch($_GET['action']){
        case "delete":
          if(is_numeric($_GET['index'])&&$_GET['index']>=0&&$_GET['index']<count($settings->users)){
            foreach(file("config.json") as $v) $tmp_str+=$v;
            $tmp_data=json_decode($tmp_str);
            $tmp_arr=array();
            for($i=0;$i<count($tmp_data->users);$i++){
              if($i!=$_GET['index']){
                $tmp_arr[]=$tmp_data->users[$i];
              }
            }
            $tmp_data->users=$tmp_arr;
            $fl=fopen("config.json", "w");
            fwrite($fl, json_encode($tmp_data));
            fclose($fl);
          }
        break;
        case "add":
          $tmp_str="";
          foreach(file("config.json") as $v) $tmp_str+=$v;
          $tmp_data=json_decode($tmp_str);
          $tmp_data->users[]=["login"=>$_GET['newlogin'],"pass"=>$_GET['newpass']];
          $fl=fopen("config.json", "w");
          fwrite($fl, json_encode($tmp_data));
          fclose($fl);
        break;
        case "status":
          echo '{"status":"OK","userscount":'.count($settings->users).',"currentuser":'.$current_settings['userid'].'}';
        break;
      }
    break;
    case "include.init":
      switch($_GET['action']){
        case "delete":
          $filecontent='';
          $tmp=[];
          foreach(file("inclusions.init") as $k=>$v){
            if($_GET['index']!=$k){
              $tmp[]=$v;
            }
          }
          $filecontent=implode("\n",$tmp);
          $includes=fopen("inclusions.init", "w");
          fwrite($includes, $filecontent);
          fclose($includes);
        break;
        case "add":
          $includes=fopen("inclusions.init", "a");
          fwrite($includes, $_GET['path']);
          fclose($includes);
        break;
        case "show":
          echo '{"status":"OK","userscount":';
          echo count($settings->users);
          echo ',"currentuser":';
          echo $current_settings['userid'];
          echo '}';
        break;
      }
    break;
  }
?>
