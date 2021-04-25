<?php
include'../Login_v1/login.php';
$url = $_SERVER['REQUEST_URI'];
$arr =substr($url,-2,1);
$_SESSION['alert_yes']= "Admin is Delete";
$_SESSION['alert_no']= "Admin is Not Delete";

if(isset($_SESSION['query2']) ){



if($_SERVER["REQUEST_METHOD"] == "GET"){

 
   
    



$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true); 


   

         if ($_SESSION['delete']==$_SESSION['delete'] ) {

                $sql = "DELETE FROM users WHERE id=".$id_f;
              
                mysqli_query($conect,$sql);
                 header("location:manger.php");
           
                 header("Location:manger.php?secuess=Admin is Delete".$_SESSION['alert_yes']) ;

         
              
            } 
       
        }else {
             header("Location:manger.php?error=Admin is Not Delete!".$_SESSION['alert_no']) ;

        
        }


     }else {
          header("location:index.php");
     }