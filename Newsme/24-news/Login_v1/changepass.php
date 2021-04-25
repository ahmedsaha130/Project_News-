<?php
include'../Login_v1/login.php';
if($_SESSION['query2'] ){
$select="";
$url = $_SERVER['REQUEST_URI'];
$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true);  
 
$_SESSION['alert_no']= "";
$_SESSION['alert_yes']= "";

$sql2 = "SELECT * FROM users WHERE id=".$id_f;

    $query = mysqli_query($conect,$sql2);

   
if ($query->num_rows>0) {
      
    $rows= mysqli_num_rows($query);

if ($rows>0) {
 
  
     while ( $row = mysqli_fetch_assoc($query)) {
     
      
         
      $_SESSION['id'] =$row['id'];  
      $_SESSION['password']=$row['password'];
     }
    }
}
// Select Users 
if (isset($_POST['change'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }



   $currentpass = validate($_POST['currentpass']);
   $newpass = validate($_POST['newpass']);
   $confirmpass= validate($_POST['confirmpass']);
  
   if (empty($currentpass)) {

    $_SESSION['alert_no'] ="current password is Require ";

   }elseif (empty($newpass)) {
    $_SESSION['alert_no'] ="new password is Require ";
  }elseif (empty($confirmpass)) {

    $_SESSION['alert_no'] ="confirm password is Require ";

  }elseif ($currentpass != $_SESSION['password']) {

    $_SESSION['alert_no'] =" current password is not match ! ";
    }elseif ($newpass != $confirmpass) {
        $_SESSION['alert_no'] =" new password and current password is not match ! ";
    


}else{
  

     $sql = "UPDATE users  SET password='$newpass' WHERE id = ".$id_f ;
     $query = mysqli_query($conect,$sql);
 
     if ($query) {
        $_SESSION['alert_yes'] ="Password is Update";
    }


}
}

   


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
    </style>
</head>

<body>

<div class="topnav">
        <a class="active" href="homeAdmin.php">Home</a>
        <a href="../Login_v1/blog_new/blog_back.php">News</a>
        <a href="../blog.php"target="_blank">View News</a>
        <a href="../Login_v1/blog_new/contcat_back.php">Contact</a>
        <a href="manger.php">Setting Admin</a>
        <form action="index.php" method="get"><a id="logout" href="logout.php"><img height="20" width="20" src="../Login_v1/images/logout.png"></a></form>
        

    </div>
    <div class="container-login100">

        <div style="background-color:#FFF; width:80%; 
       padding:10%;
      height:50%">
            <form action="" method="POST" class="login100-form validate-form">
                <span class="login100-form-title p-b-59">
                   Update Password Admin
                </span>
                <?php    

          
          if (!empty(($_SESSION['alert_no']) )) {
           echo "<p name='error' class = 'error'>".$_SESSION['alert_no']."</p>"  ;
     }elseif(!empty(($_SESSION['alert_yes'])) ) {
         # code...
     }
           echo "<p name='secuess' class = 'secuess'>".$_SESSION['alert_yes']."</p>"; 
   
 
unset($_SESSION['alert_yes']);
unset($_SESSION['alert_no']);
     ?>
 
     
     
                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Current Password </span>
                    <input class="input100" type="password" value="" name="currentpass" placeholder="Current Password...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">New Password</span>
                    <input class="input100" type="password" value="" name="newpass" placeholder="New Password...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" value="" name="confirmpass" placeholder="Confirm Password...">
                    <span class="focus-input100"></span>
                </div>



                <button   name="change" class="login100-form-btn">
								Change Password
							</button>
					
               
                </div>

							


              
                  

                  
                </div>
            </form>
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

?>