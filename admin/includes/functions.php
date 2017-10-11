<?php require_once("header.php"); ?>
<?php 
//To add the data to database function start from here
function addDataFunction(){
    global $connection;
  $target_dir = "../upload/";
if(isset($_POST['submit'])){
    $postTitle = $_POST['postTitle'];
    $postAuthor = $_POST['postAuthor'];
    $postDate = date('m-d-y');
     //this code is just for images
     $imgName = $_FILES['fileToUpload']['name'];
	 $imgTmp = $_FILES['fileToUpload']['tmp_name'];
	 $imgSize = $_FILES['fileToUpload']['size'];
     $imageChangeName = rand(100,500).$imgName;
     $image = move_uploaded_file($imgTmp,$target_dir.$imageChangeName);
    
     $postContent = $_POST['postContent'];
     
     
    $insertSql = "INSERT INTO posts_home (posts_home_title,posts_home_author,posts_home_date,posts_home_images,posts_home_contents) " ; 
     $insertSql .= "VALUES ('{$postTitle}','{$postAuthor}',now(),'{$imageChangeName}','{$postContent}') " ;
     
    $insertQuery = mysqli_query($connection, $insertSql);
    //check data insert on database or not
     if($insertQuery){
         echo "Inserting Data, Please wait....."."&nbsp&nbsp"."<img  style='width:5%; height:5%;' src='../image/redirecting.gif'>";         
     }else{
         die("Failed Query!" . mysqli_error($connection));
     }
     //header("Location:addposts.php");
     header("refresh:5;../posts/home.php");
 }else{
       unset($_POST);
    } 
        mysqli_close($connection);
  
}


//for updating 
function updateFunction(){
    global $connection;
  $target_dir = "../upload/";
    if(isset($_POST['update'])){
 if(isset($_GET['edit'])){
    $idForUpdate = $_GET['edit'];
   $imageName = "SELECT posts_home_images FROM posts_home WHERE posts_home_id = '{$idForUpdate}' ";
   $result = mysqli_query($connection,$imageName);
    while($rows = mysqli_fetch_assoc($result)){
      $selectedImageName = $rows['posts_home_images'];
    }
 }
 $postTitle = $_POST['postTitle'];
 $postAuthor = $_POST['postAuthor'];
 $postContent = $_POST['postContent'];   
//image code end here
    $imgName = $_FILES['fileToUpload']['name'];
    $imgTmp = $_FILES['fileToUpload']['tmp_name'];
    $imgSize = $_FILES['fileToUpload']['size'];
    $imageChangeName = rand(100,500).$imgName;
    //$image = move_uploaded_file($imgTmp,$target_dir.$imgName);
    
    
   if(!empty($imgName)){
       //check the file
       $checkTheFile = $target_dir.$selectedImageName;
       if(file_exists($checkTheFile)){
           unlink($target_dir.$selectedImageName);
           move_uploaded_file($imgTmp,$target_dir.$imageChangeName);
       }else{
           move_uploaded_file($imgTmp,$target_dir.$imageChangeName);
       }
       $query = "UPDATE posts_home SET posts_home_title = '{$postTitle}', posts_home_author = '{$postAuthor}', posts_home_date = now(), posts_home_images = '{$imageChangeName}', posts_home_contents = '{$postContent}' WHERE posts_home_id = '{$idForUpdate}' ";
 $update = mysqli_query($connection, $query);
if($update){
         echo "Updating Data, Please wait....."."&nbsp&nbsp"."<img  style='width:5%; height:5%;' src='../image/redirecting.gif'>";         
     }else{
         die("Failed Query!" . mysqli_error($connection));
     }
     //header("Location:addposts.php");
     header("refresh:5;../posts/home.php");    
      
   }else{
    $query = "UPDATE posts_home SET posts_home_title = '{$postTitle}', posts_home_author = '{$postAuthor}', posts_home_date = now(), posts_home_contents = '{$postContent}' WHERE posts_home_id = '{$idForUpdate}' ";
 $update = mysqli_query($connection, $query);
if($update){
         echo "Updating Data, Please wait....."."&nbsp&nbsp"."<img  style='width:5%; height:5%;' src='../image/redirecting.gif'>";         
     }else{
         die("Failed Query!" . mysqli_error($connection));
     }
     //header("Location:addposts.php");
     header("refresh:5;../posts/home.php");
   
   }

 }  
}

//for secure 
function escape($string){
    global $connection;
   return mysqli_real_escape_string($connection,trim($string));
}

?>