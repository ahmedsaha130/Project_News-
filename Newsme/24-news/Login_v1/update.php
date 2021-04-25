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
      // $_SESSION['id']  = $row['id'];
      // $_SESSION['update'] = $row['id'];
      // $_SESSION['nameAdmin'] = $row['fullname'];
      
         
      $_SESSION['id'] =$row['id'];
      $_SESSION['fullname']= $row['fullname'];
      $_SESSION['username'] =$row['username'];
      $_SESSION['email']= $row['email'];    
      $_SESSION['password']=$row['password'];
     }
    }
}
// Select Users 
if (isset($_POST['update'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }
   $fullname = validate($_POST['name']);
   $email = validate($_POST['email']);
   $username= validate($_POST['username']);
  

   $sql_check_email = "SELECT * FROM users WHERE email='$email'";
   $sql_check_user = "SELECT * FROM users WHERE username='$username'";

   $query_check_email =mysqli_query($conect,$sql_check_email);
   $query_check_user =mysqli_query($conect,$sql_check_user);


   if (empty($fullname)) {

    $_SESSION['alert_no'] ="Full Name is Require ";
   }elseif (empty($email)) {
    $_SESSION['alert_no'] ="Email is Require ";
  }elseif (empty($username)) {

    $_SESSION['alert_no'] ="User Name Name is Require ";


}  elseif (mysqli_num_rows($query_check_email)>0) {
    $_SESSION['alert_no'] ="The Email is already in use";
  
} elseif (mysqli_num_rows($query_check_user)>0) {
    $_SESSION['alert_no'] ="The username is already in use";
  
}else{
  

    
 
     
     $sql = "UPDATE users  SET fullname='$fullname',email ='$email', username ='$username' WHERE id = ".$id_f ;
     $query = mysqli_query($conect,$sql);
 
     if ($query) {
        $_SESSION['alert_yes'] ="Admin is Update";
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
        <a href="../../24-news/blog.php"target="_blank">View News</a>
        <a href="./blog_new/contcat_back.php">Contact</a>
        <a href="manger.php">Setting Admin</a>
        <form action="index.php" method="get"><a id="logout" href="logout.php"><img height="20" width="20" src="../Login_v1/images/logout.png"></a></form>
        

    </div>

    <div class="container-login100">

        <div style="background-color:#FFF; width:80%; 
       padding:5%;
      height:50%">
            <form action="" method="POST" class="login100-form validate-form">
                <span class="login100-form-title p-b-59">
                   Update Information Admin
                </span>
                <?php    

          
          if (!empty(($_SESSION['alert_no']) )) {
           echo "<p name='error' class = 'error'>".$_SESSION['alert_no']."</p>"  ;
     }elseif(!empty(($_SESSION['alert_yes'])) ) {
        echo "<p name='secuess' class = 'secuess'>".$_SESSION['alert_yes']."</p>";      }
         
   
 
unset($_SESSION['alert_yes']);
unset($_SESSION['alert_no']);
     ?>
 
     
     
                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Full Name </span>
                    <input class="input100" type="text" value="<?php echo $_SESSION['fullname'] ?>" name="name" placeholder="Name...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" value="<?php  echo $_SESSION['email']  ?>" name="email" placeholder="Email addess...">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" value="<?php echo $_SESSION['username']  ?>" name="username" placeholder="Username...">
                    <span class="focus-input100"></span>
                </div>



                <button   name="update" class="login100-form-btn">
								Update
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