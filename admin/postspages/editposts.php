<?php 
include("../includes/header.php");
include("../includes/functions.php");
$target_dir = "../upload/";
?>
<!DOCTYPE html>
<html>
	<head>
<script type="text/javascript" src="../javascript/editValidation.js"></script>
		<title>CodeGangProject</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" />
		<meta charset="utf-8"/>
		<meta type="viewport" content="width=device-width" />
	</head>
	<body>
		<div id="container">
			<header class="main-header">
				<img id="logo" src="../../images/logo.png" alt="logo" />
				<nav class="main-nav">
					<ul>
						<li><a href="../index.php"  class="active">Home</a></li>
						<li><a href="../pages/adminstrator.php">Adminstrator</a></li>
						<li><a href="../pages/posts.php">Posts</a></li>	
						<li><a href="../pages/sideBarPosts.php">SideBarPosts</a></li>		
					</ul>
				</nav>
			</header>
<!--Table start From Here-->		
	<table class="table" style="text-align:center;">
	    <tbody>
	        <thead>
	            <th><a href="../pages/posts.php">Home</a></th>
	            <th><a href="../posts/education.php">Education</a></th>
	            <th><a href="../posts/technews.php">TechNews</a></th>
	            <th><a href="../posts/worldnews.php">WorldNews</a></th>
	            <th><a href="../posts/contact.php">Contact</a></th>
	        </thead>
	    </tbody>
	</table>	
<!--Table End From Here-->			
<!--PHP code start From Here-->	

<?php 
    updateFunction();      
?>

<?php 
if(isset($_GET['edit'])){
   //Check the server connection first
    if(!$connection){
         die("Database connection faild!" . mysqli_error());
    }
//Get the specific database ID for editing
$idForEdit = $_GET['edit'];
//select all the data from database
$query = "SELECT * FROM posts_home WHERE posts_home_id = {$idForEdit}" ;
$result = mysqli_query($connection,$query);
//pull all the data from database with using while loops
 while($rows = mysqli_fetch_assoc($result)){
    $db_posts_home_id = $rows['posts_home_id'];
    $db_posts_home_title = $rows['posts_home_title'];
    $db_posts_home_author = $rows['posts_home_author'];
    $db_posts_home_date = $rows['posts_home_date'];
    $db_posts_home_images = $rows['posts_home_images'];
    $db_posts_home_contents = $rows['posts_home_contents'];
 } 
}else{
    header("Location:../../index.php");
}         
?>
<!--PHP code End From Here-->	
<a style="color:#FFFFFF;" href="../posts/home.php"><button type="button" style="float:right; padding:5px 20px 5px 20px; font-size:20px;" class="btn btn-primary">Go Back Post</button></a>
   <span class="label label-info">Your are in Edit Posts Page </span>
   <form action="" class="form-group" method="post" enctype="multipart/form-data" name="editPosts" onsubmit="return(validateForUpdate());">
    <table class="table table-striped table-hover table-bordered">
    
       <th style="text-align:center;"><h3>Update Posts</h3></th>
        <tr style="background:#f2f2f2;"><td><b>Post Title</b><p style="float:right; color:red;" id="postTitleErrorMsg"></p></td></tr>
        <tr><td><input type="text" class="form-control" name="postTitle" value="<?php echo $db_posts_home_title; ?>" onkeydown="return(postTitleErrorMsgDelete());"></td></tr>
        <tr style="background:#f2f2f2;"><td><b>Post Author</b><p style="float:right; color:red;" id="postAuthorErrorMsg"></p></td></tr>
        <tr><td><input type="text" class="form-control" name="postAuthor" value="<?php echo $db_posts_home_author; ?>" onkeydown="return(postAuthorErrorMsgDelete());"></td></tr>
          <tr style="background:#f2f2f2;"><td><b>Upload Image [optional]</b><p style="float:right; color:red;" id="postImageErrorMsg"></p></td></tr>
       <tr style="background:#f2f2f2;"><td>
       <input type="file" id="fileChooser" name="fileToUpload" multiple accept='image/*'   onclick="return(postImageErrorMsgDelete());"></td></tr>
        <tr><td><p>Your Selected Image:</p>
           
            <?php 
            $selectImage = $target_dir . $db_posts_home_images;
            if(file_exists($selectImage)){
                  echo "<img src='$selectImage' width='80' height='60'>";
            }else{
                echo "No Image";
            }    
            ?>
        </td></tr>
        <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
        <tr style="background:#f2f2f2;"><td><b>Post Content</b><p style="float:right; color:red;" id="postContentErrorMsg"></p></td></tr>
        <tr><td><textara></textara></td></tr>
        <tr><td><textarea class="ckeditor" name="postContent"  onkeydown="return(postContentErrorMsgDelete());"><?php echo $db_posts_home_contents; ?></textarea></td></tr>
        <tr><td style="float:right;"><input type="submit" value="UpDate" name="update" class="btn btn-primary"></td></tr>
    </table>			
	</form>	
	    <footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
	</body>
</html>