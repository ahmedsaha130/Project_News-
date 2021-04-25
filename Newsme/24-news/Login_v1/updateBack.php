<?php
include'../Login_v1/login.php';

$url = $_SERVER['REQUEST_URI'];
$id =  parse_url($url, PHP_URL_QUERY);
$id_f = strstr($id, '=', true);  

echo $id_f;

$sql2 = "SELECT * FROM users ";

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
       
  


  
     $fullname =$_POST['name']; 
     $email =$_POST['email']; 
     $username =$_POST['username']; 
 
     
     $sql = "UPDATE users  SET fullname='$fullname',email ='$email', username ='$username' WHERE id = ".$id_f ;
      mysqli_query($conect,$sql);
      echo $id_f;

      header("Location:update.php?secuess=Admin is  Update!") ;

    }
    

 
 else {
     
      header("Location:update.php?error=Admin is Not Update!") ;
 
 }
 

   
  
    ?>
  