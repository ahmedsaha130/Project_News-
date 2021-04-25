<?php
include '../../consaintent/consaintent.php';
session_start();
date_default_timezone_set('Asia/Gaza');
$conect = mysqli_connect(servername,userDB,passDB,DB);
if( isset($_SESSION['query2']) == 1  ){

$url = $_SERVER['REQUEST_URI'];
$arr =substr($url,-2,1);
$_SESSION['alert_yes']= "News is Delete";
$_SESSION['alert_no']= "News is Not Delete";


if($_SERVER["REQUEST_METHOD"] == "GET"){

$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true); 


   

         if ($_SESSION['delete']==$_SESSION['delete'] ) {

                $sql = "DELETE FROM blog WHERE id=".$id_f;
              
                mysqli_query($conect,$sql);
                 header("location:../blog_new/blog_back.php.php");
           
                 header("Location:../blog_new/blog_back.php?secuess=Admin is Delete".$_SESSION['alert_yes']) ;

         
              
            } 
       
        }else {
             header("Location:../blog_new/blog_back.php?error=Admin is Not Delete!".$_SESSION['alert_no']) ;

        
        }


     }else {
          header("location:index.php");
     }

     ?>

