<?php

include '../consaintent/consaintent.php';
session_start();

$conect = mysqli_connect(servername,userDB,passDB,DB);



if (isset($_POST['login'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }
    
       $email = validate($_POST['email']);
       $password = validate($_POST['pass']);

       $_SESSION['email']=$email;

       $_SESSION['password']=$password;
  
    $sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";


    $query = mysqli_query($conect,$sql);
           
    
   
    $_SESSION['query2']= $query->num_rows;
    
 
if ($query->num_rows>0) {

    

    header("Location:HomeAdmin.php") ;

    
  
}else {

           
    header("Location:index.php?error=Your Failed Password OR Email!") ;

}


}

   
?>

