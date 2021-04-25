<?php

include '../../consaintent/consaintent.php';
session_start();
date_default_timezone_set('Asia/Gaza');
$conect = mysqli_connect(servername,userDB,passDB,DB);

if( isset($_SESSION['query2']) ){


$url = $_SERVER['REQUEST_URI'];
$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true);  

$_SESSION['alert_no']= "";
$_SESSION['alert_yes']= "";

$sql2 = "SELECT * FROM blog WHERE id=".$id_f;
 $query = mysqli_query($conect,$sql2);


   
if ($query->num_rows>0) {
      
    $rows= mysqli_num_rows($query);

if ($rows>0) {
 
  
     while ( $row = mysqli_fetch_assoc($query)) {
      // $_SESSION['id']  = $row['id'];
      // $_SESSION['update'] = $row['id'];
      // $_SESSION['nameAdmin'] = $row['fullname'];
      
         
      $_SESSION['id'] =$row['id'];
      $_SESSION['title']= $row['title'];
      $_SESSION['descrption'] =$row['descrption'];
      $_SESSION['img'] =$row['img'];
      $_SESSION['currentdate']= $row['currentdate'];    
      $_SESSION['view']=$row['view'];
      $_SESSION['feature']=$row['feature'];
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

    $title = validate($_POST['title']);
    $descrption =validate($_POST['descrption']);
    $feature = validate($_POST['feature']);
    $view = validate($_POST['view']);
         //img

  $file = $_FILES['img'];
  $file_name = $_FILES['img']['name'];
  $file_tmp= $_FILES['img']['tmp_name'];


  $file_type = $_FILES['img']['type'];
 //  $file_size = $_FILES['img']['size'];
 $file_error = $_FILES['img']['error'];

  $uploadPath = '../../images/uploadimge/'. basename($file_name);
  $extention = array('jpeg','png','jpg','gif','xlsx');
  $array_extention = explode('.',$file_name);

  $extention = array('jpeg','png','jpg','gif','xlsx');


  $extention_convert = strtolower(end($array_extention));


    $timedate =date("F j, Y, g:i a");
   
    if (empty($title)) {
 
     $_SESSION['alert_no'] ="Titel is Require ";
    }elseif (empty($descrption)) {
     $_SESSION['alert_no'] ="Descrption is Require ";
   }elseif (empty($feature)) {
 
     $_SESSION['alert_no'] ="Feature  is Require ";
 
 
   
 }elseif ($file_error == 4) {
 
     $_SESSION['alert_no'] = "Sory ,File is Empty Uploaded  ";

 } elseif (!(in_array($extention_convert,$extention))) {

  $_SESSION['alert_no'] = "Sory ,File No Extention png ,jpg jpge ,gif ";

 }elseif (empty($view)) {
 
     $_SESSION['alert_no'] ="View  is Require ";
 

 }else {

    

     
     $sql = "UPDATE blog SET title='$title', descrption ='$descrption', img ='$file_name', currentdate ='$timedate',
     view = '$view', feature ='$feature' WHERE id = $id_f";

     $query = mysqli_query($conect,$sql);
 
     if ($query) {
        $_SESSION['alert_yes'] ="News is Update";

 
     }else {
        $_SESSION['alert_no'] ="News is Not Update";
  
     }

}
}
   


   
}else {
    header("location:../../Login_v1/index.php");
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

  input[type=text], select, textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.adddiv {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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
        <a class="active" href="../homeAdmin.php">Home</a>
        <a href="../blog_new/blog_back.php">News</a>
        <a href="../../blog.php" target="_blank">View News</a>
        <a href="../blog_new/contcat_back.php">Contact</a>
        <a href="../manger.php">Setting Admin</a>
        <form action="index.php" method="get"><a id="logout" href="../logout.php"><img height="20" width="20" src="../images/logout.png"></a></form>
        

    </div>

    <div class="container-login100">
    <h2>Update News</h2>
        <div style="background-color:#FFF; width:80%; 
       padding:5%;
      height:50%">
            <div class="adddiv">
  <form action="" method="POST" enctype="multipart/form-data">

  <?php    

          
if (!empty(($_SESSION['alert_no']) )) {
 echo "<p name='error' class = 'error'>".$_SESSION['alert_no']."</p>"  ;
}elseif(!empty(($_SESSION['alert_yes'])) ) {
    echo "<p name='secuess' class = 'secuess'>".$_SESSION['alert_yes']."</p>"; 

}


unset($_SESSION['alert_yes']);
unset($_SESSION['alert_no']);
?>

    <label for="fname"><h5>Titel</h5></label>
    <input type="text" id="fname" name="title" value="<?php echo $_SESSION['title'];?>" placeholder="Your Title..">

    <label for="lname"><h5>Descrption</h5></label>
    <textarea    name="descrption"><?php echo $_SESSION['descrption'];?></textarea>

    <label class="file">
  <input type="file" id="file" descrption value="<?php echo $_SESSION['img'];?>" name="img" aria-label="File browser example">
  <span class="file-custom"></span>
   </label>
<br>
    <label><h5>Feature</h5> </label>
    <select id="country" name="feature">
      <option value="feature">Feature</option>
      <option value="nofeature"> No Feature</option>
      
      </select>

<label><h5>Views</h5> </label>
<select id="country" name="view">
  <option value="view">View</option>
  <option value="noview"> No View</option>
  
</select>

    <input type="submit"  name = "update" value="Update News ">
  </form>

         
			</div>
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