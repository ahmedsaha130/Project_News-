<?php
date_default_timezone_set('Asia/Gaza');
session_start();
include '../consaintent/consaintent.php';
if(isset($_SESSION['query2'] )){

 
}else {
    header("location:index.php");

}
?>

   
    
  


<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
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
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      font-weight: 800;
      color: #fff;
      background-color: #4CAF50;
      font-size: 20px;
      text-align: center;
      margin-top: -102px ;
      padding: 10px;
      border: 2px solid #f00;
  }
  h3{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      font-weight: 800;
      color: #fff;
      background-color: #4CAF50;
      font-size: 20px;
      text-align: center;
      float: right;
       margin-top: -125px;
    margin-right: -487px;
      padding: 10px;
      border: 2px solid #f00;
 
  }
  .personal{
    border: 5px solid DarkGreen;
 height: 200px ;
 width: 200px ;
    float: right;
    filter: drop-shadow(0px 10px 3px Salmon);
    margin-right: -460px;
    margin-top: -340px;
  }
    </style>
</head>

<body>

<div class="topnav">
        <a class="active" href="homeAdmin.php">Home</a>
        <a href="../Login_v1/blog_new/blog_back.php">News</a>
        <a href="../../24-news/blog.php" target="_blank">View News</a>
        <a href="../Login_v1/blog_new/contcat_back.php">Contact</a>
        <a href="manger.php">Setting Admin</a>
        <form action="index.php" method="get"><a id="logout" href="logout.php"><img height="20" width="20" src="../Login_v1/images/logout.png"></a></form>
        
    </div>
  

    </div>
    <div class="container-login100">

        <div style="background-color:#FFF; width:80%; 
       padding:10%;
      height:50%">
    <h2 > Welcome to the webmaster page</h2>

            <form action="" method="POST" class="login100-form validate-form">
                <!-- <span class="login100-form-title p-b-59"> -->
                  
               <?php


if(isset($_SESSION['query2'] )){
    $conect = mysqli_connect(servername,userDB,passDB,DB);

    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";

    $query = mysqli_query($conect,$sql);

  
            if ($query->num_rows>0) {
      
              $rows= mysqli_num_rows($query);
       
        if ($rows>0) {
           
            
               while ( $row = mysqli_fetch_assoc($query)) {
                // $_SESSION['id']  = $row['id'];
                // $_SESSION['update'] = $row['id'];
                // $_SESSION['nameAdmin'] = $row['fullname'];
                
                    
                   $id= $row['id'];
                   $fullname= $row['fullname'];
                   $username= $row['username'];
                    $email=  $row['email'];    
                    $password=$row['password'];
                    $img=$row['img'];
                 
               }
           }
     
    echo "<hr>";

    echo  "<table id ='customers' border ='1'>";
    echo "<tr><th colspan='3'>Check-in date </th><td>".date("F j, Y, g:i a")."</td></tr>";
    echo "<tr><th colspan='3'>Welcom Mr </th><td>".$fullname."</td></tr>";
    echo "<tr><th colspan='3'>User Name </th><td>".$username."</td></tr>";
    echo "<tr><th colspan='3'>Email </th><td>".$email."</td></tr>";
    echo "<tr><th colspan='3'>password </th><td>".$password."</td></tr>";
    // echo "<tr><th colspan='3'>img </th><td>".$img."</td></tr>";


    echo "</table>";
    ?>
    <img class="personal" src="../images/uploadimg_user/<?php echo $img?>">
    <h3>Mr Admin :<?php echo $fullname ?></h3>
<?php
  

        }
}else {
    
    header("location:index.php");
}
    ?>
               
        
                <!-- </span> -->
         
        
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
