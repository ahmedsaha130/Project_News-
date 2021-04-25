<?php
include '../Login_v1/login.php';

if ( isset($_SESSION['email']) ==$_SESSION['email'] && isset($_SESSION['password'])==$_SESSION['password']) {

 
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    session_destroy(); # code...
    header("location:index.php");

}else {
  
}
   
