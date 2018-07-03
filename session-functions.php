<?php

session_start();

function set_session_variable($key, $value){
  $_SESSION[$key] = $value;
}

function get_session_variable($key, $default = ''){
  if(isset($_SESSION[$key])){
     return $_SESSION[$key];
  }else{
    return $default;
  }
}

function kill_session_variable($key){
  unset($_SESSION[$key]);
}

function logout(){
  kill_session_variable('name');
  kill_session_variable('username');
  kill_session_variable('userType');
}

function check_if_signed_in(){
  if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
    return true;
  } else{
    return false;
  }
}

function redirect_if_not_signed_in(){
  if(!check_if_signed_in()){
    header("Location: sign-in.php");
    die();
  }
}

function get_user_type(){
  if(isset($_SESSION['userType']) && $_SESSION['userType']){
    return $_SESSION['userType'];
  }else{
    return false;
  }
}

function redirect_if_no_access($role){
  $user_type = get_user_type();
  if($user_type != $role){
      redirect_to_role_home($user_type);
  }
}

function redirect_to_role_home($user_type){
    header("Location: $user_type-home.php");
    die();
}

?>
