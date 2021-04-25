<?php

date_default_timezone_set('Asia/Gaza');
session_start();

include '../../consaintent/consaintent.php';

$conect = mysqli_connect(servername,userDB,passDB,DB);

$url = $_SERVER['REQUEST_URI'];
$arr =substr($url,-2,1);

$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true); 

$_SESSION['alert_yes']= "Clients is Delete";
$_SESSION['alert_no']= "Cleints is Not Delete";


if(isset($_SESSION['query2'])){



if($_SERVER["REQUEST_METHOD"] == "GET"){


                $sql = "DELETE FROM contact WHERE id=".$id_f;
              
               $query = mysqli_query($conect,$sql);
               
            if ($query) {
                header("Location:../blog_new/contcat_back.php?secuess=Clients is Delete!".$_SESSION['alert_no']) ;
                unset($_SESSION['alert_yes']);
                session_destroy($_SESSION['alert_yes']);
              }
                

        }else {
          header("Location:../blog_new/contcat_back.php?error=Clients is Not Delete!".$_SESSION['alert_no']) ;

        
        }
        
    }else {
          header("location:../index.php");
     }

    ?>
  

   
    
  


<!DOCTYPE html>
<html>
<a href="../blog_new/contcat_back.php"
<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--===============================================================================================-->	

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
    body {
        margin-bottom: 0px;
        padding-bottom: 0px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }

    .button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    #button1 {
        background-color: #4CAF50;
    }

    /* Green */
    #button2 {
        background-color: #008CBA;
    }

    /* Blue */
    #button3 {
        background-color: #f44336;
    }

    /* Red */



    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    .error 
  {
      background-color:#f2DEDE;
      color: #A94442;
      padding:10px;
      width: 95%;
      border-radius:5px ;
      margin:  20x auto;
  }
  .secuess
  {
    background-color: #32c353b3;
    color: #fff;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
  }
  h2{
    background-color: #A94442;
    font-size: 30px;
    font-weight: 500;
    color: #FFF;
    position:absolute;
    top: 100px;
    padding: 20px;
    border:3px solid DarkSeaGreen;
  }
    </style>
</head>

<body>

<div class="topnav">
        <a class="active" href="../homeAdmin.php">Home</a>
        <a href="../blog_new/blog_back.php">News</a>
        <a href="../../../24-news/blog.php" target="_blank">View News</a>
        <a href="#contact">Contact</a>
       
        <a href="../manger.php">Setting Admin</a>
        <form action="index.php" method="get"><a id="logout" href="../logout.php"><img height="20" width="20" src="../images/logout.png"></a></form>
        

    </div>

    <div class="container-login100">
    <h2>Contact Us</h2>
        <div style="background-color:#FFF; width:80%; 
       padding:10%;
      height:50%">
       <?php
      if(isset($_SESSION['query2'] )){

    $sql2 = "SELECT * FROM contact ";

    $query = mysqli_query($conect,$sql2);

  
  
     

        if (!empty($_SESSION['alert_yes'])||!empty($_SESSION['alert_no']) ) {
          
         
      
         if (isset($_GET['error'])) {
          echo "<p name='error' class = 'error'>".$_SESSION['alert_no']."</p>"  ;
    }
    if (isset($_GET['secuess'])) {
          echo "<p name='secuess' class = 'secuess'>".$_SESSION['alert_yes']."</p>"; 
    }
  }
        
        echo "<table id ='customers' border ='1'>";
        echo "<tr>";
        echo "<th>"."ID"."</th>";
        echo "<th>"."Full Name"."</th>";
        echo "<th>"."E-mail"."</th>";
        echo "<th>"."Subject"."</th>";
        echo "<th>"."Message"."</th>";
        echo "<th>"."Opertion"."</th>";
        echo "</tr>";

   

          if (isset($_SESSION['email'])==$_SESSION['email']) {
         
            if ($query->num_rows>0) {
      
              $rows= mysqli_num_rows($query);
       
        if ($rows>0) {
           
            
               while ( $row = mysqli_fetch_assoc($query)) {
       
                   echo "<tr>";
                   echo "<td>".$row['id']."</td>";
                   echo "<td>".$row['name']."</td>";
                   echo "<td>".$row['email']."</td>";
                   echo "<td>".$row['subject']."</td>";    
                   echo "<td>".$row['message']."</td>";
                   echo '<form action="" method="GET">';   
                   echo "<td><button class='button' id='button3'name =".$row['id']."> <i class='fa fa-trash'></i></button></td>";
                   echo  '</form>';
                   echo "<tr>";
               }
           }
    
    
        
         
    
         
        
          }
        }
  
  
         
    echo"</table>";
  }else {
    
    header("location:index.php");
}
  
               ?>
     
              
        </div>
    </div>
    </div>
    <footer class="bg-dark text-center text-white">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright: By | Ahmed Salha
         
      
    </footer>
</body>

</html>
<?php
    unset($_SESSION['alert_yes']);
  unset($_SESSION['alert_no']);

?>