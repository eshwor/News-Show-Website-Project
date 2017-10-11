<?php include("includes/header.php"); ?>
<?php
session_start();
if(isset($_POST['login'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
$username = mysqli_real_escape_string($connection, $username);    
$password = mysqli_real_escape_string($connection, $password);
    
$query = "SELECT * FROM admin WHERE username = '{$username}' ";
$selectUserQuery = mysqli_query($connection, $query);
if(!$selectUserQuery){
    die("Query Failed");
}
    while($rows = mysqli_fetch_array($selectUserQuery)){
        $db_id = $rows['id'];
        $db_username = $rows['username'];
        $db_password = $rows['password'];
        $db_fullname = $rows['fullname'];
        
        
    }  
if($username !== $db_username){
   header("Location: ../index.php");

}else if($username == $db_username && $password === $db_password){
    header("Location: index.php");
     $_SESSION['username'] = $db_username;
     $_SESSION['password'] = $db_password;
     $_SESSION['fullname'] = $db_fullname;
   
}
    
    
}else{
     header("Location: ../index.php");
}
?>