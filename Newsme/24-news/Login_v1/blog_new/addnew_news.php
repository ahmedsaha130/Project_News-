<?php
include '../../consaintent/consaintent.php';
session_start();
date_default_timezone_set('Asia/Gaza');
$conect = mysqli_connect(servername,userDB,passDB,DB);
 
$_SESSION['alert_no']= "";
$_SESSION['alert_yes']= "";

  if( isset($_SESSION['query2']) ){
    if (isset($_POST['add'])) {


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

     $uploadPath = '../../images/uploadimge/'.basename($file_name);
     $extention = array('jpeg','png','jpg','gif','xlsx');
     $array_extention = explode('.',$file_name);

    //  $extention = array('jpeg','png','jpg','gif','xlsx');


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

     $_SESSION['alert_no'] = "Sory ,File No Extention png ,jpg ,jpge ,gif ";

    }elseif (empty($view)) {
    
        $_SESSION['alert_no'] ="View  is Require ";
    
   
    }else {
        $sql = "INSERT INTO blog(title,descrption,img,currentdate,view,feature) VALUES 
        ('$title','$descrption','$file_name','$timedate','$view','$feature'); ";

        mysqli_query($conect,$sql);
        move_uploaded_file($file_tmp,$uploadPath);
        $_SESSION['alert_yes'] ="News is Added ";

    }

}

    


}else {
    header("location:../../Login_v1/index.php");
}




?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta charset="UTF-8">

<!--===============================================================================================-->	
<link rel="icon" href="http://example.com/favicon.png">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a   {
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
  background-color: #4CAF50; /* Green */
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

#button1 {background-color: #4CAF50;} /* Green */
#button2 {background-color: #008CBA;} /* Blue */
#button3 {background-color: #f44336;} /* Red */
#button4 {background-color: DarkCyan;} /* Red */


#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
<h2>Add News</h2>
				<div  style="background-color:#ffffffe0; width:100%; 
       padding:15%;
      height:100%">
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
    <input type="text" id="fname" name="title" placeholder="Your name..">

    <label for="lname"><h5>Descrption</h5></label>
    <textarea  rows="4" cols="50" name="descrption" ></textarea >

    <label class="file">
  <input type="file" id="file"  name="img" aria-label="File browser example">
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

    <input type="submit"  name = "add" value="Add News ">
  </form>

         
			</div>
		</div> 
</div>
<footer class="bg-dark text-center text-white">

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright: By | Ahmed Salha
    <a class="text-white" href="https://mdbootstrap.com/"</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
