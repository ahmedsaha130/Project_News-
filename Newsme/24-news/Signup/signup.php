<?php

include '../consaintent/consaintent.php';
session_start();

$conect =mysqli_connect(servername,userDB,passDB,DB);

if (isset($_POST['signup'])) {
  

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }
   $fullname = validate($_POST['name']);
   $email = validate($_POST['email']);
   $username= validate($_POST['username']);
   $password = validate($_POST['pass']);
   $repeate_pass = $_POST['repeat-pass'];

   $_SESSION['name']=$fullname;
   $_SESSION['username']=$username;
   $_SESSION['password']=$password;
   
  

   $sql_check_email = "SELECT * FROM users WHERE email='$email'";
   $sql_check_user = "SELECT * FROM users WHERE username='$username'";

   $query_check_email =mysqli_query($conect,$sql_check_email);
   $query_check_user =mysqli_query($conect,$sql_check_user);

   $file = $_FILES['img'];
   $file_name = $_FILES['img']['name'];
   $file_tmp= $_FILES['img']['tmp_name'];


   $file_type = $_FILES['img']['type'];
  //  $file_size = $_FILES['img']['size'];
  $file_error = $_FILES['img']['error'];

   $uploadPath = '../images/uploadimg_user/'. basename($file_name);
   $extention = array('jpeg','png','jpg','gif','xlsx');
   $array_extention = explode('.',$file_name);
   $extention_convert = strtolower(end($array_extention));

  //  $extention = array('jpeg','png','jpg','gif','xlsx');

 

   if (empty($fullname)) {

    header("Location: index.php?error=Full Name is required");
    exit();

   }elseif (empty($email)) {
    header("Location: index.php?error=Email  is required");
    exit();
  }elseif (empty($username)) {

    header("Location: index.php?error=Email  is required");
    exit();
  }elseif(empty($password)) {
  
    header("Location: index.php?error=Password is required");
    exit();
  }elseif ($password !== $repeate_pass) {
    header("Location:index.php?error=The Two Password Not Match");
    exit();


  }elseif ($file_error == 4) {

    header("Location:index.php?error=Sory ,File is Empty Uploaded  ");
}elseif (mysqli_num_rows($query_check_email)>0) { ///select check email is already 
    header("Location:index.php?error=The Email is already in use");
    exit();
 
    
} elseif (mysqli_num_rows($query_check_user)>0) {
  header("Location:index.php?error=The username is already in use");
  exit();
  

 

}else{
  
// Check email #1
  
  $sql = "INSERT INTO users(fullname,email,username,password,img) VALUES ('$fullname','$email','$username','$password','$file_name'); ";
  $quey = mysqli_query($conect,$sql);
  move_uploaded_file($file_tmp,$uploadPath);
  header("Location:index.php?secuess=Your Secceful Regsiter ".$query2) ;


   }
  }

?>
<img src="../images/uploadimg_user/"