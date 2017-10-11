<?php include("../includes/header.php");
      include("../includes/functions.php");
$target_dir = "../upload/";
?>
<!DOCTYPE html>
<html>
	<head>
	  <script type="text/javascript" src="../javascript/javascript.js"></script>
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
    addDataFunction();  

?>                     
<!--PHP code End From Here-->	
<a style="color:#FFFFFF;" href="../posts/home.php"><button type="button" style="float:right; padding:2px 15px 2px 15px; font-size:15px;" class="btn btn-primary">Go Back Post</button></a>
   <span class="label label-info">Your are in New Posts Page </span>
   <form action="" class="form-group" method="post" enctype="multipart/form-data" name="addPosts" onsubmit="return(validate());">
    <table class="table table-striped table-hover table-bordered">
       <th style="text-align:center;"><h3>Create New Post</h3></th>
        <tr style="background:#f2f2f2;"><td><b>Post Title</b><p style="float:right; color:red;" id="postTitleErrorMsg"></p></td></tr>
        <tr><td><input type="text" class="form-control" name="postTitle" onkeydown="return(postTitleErrorMsgDelete());"></td></tr>
        <tr style="background:#f2f2f2;"><td><b>Post Author</b><p style="float:right; color:red;" id="postAuthorErrorMsg"></p></td></tr>
        <tr><td><input type="text" class="form-control" name="postAuthor" onkeydown="return(postAuthorErrorMsgDelete());"></td></tr>
          <tr style="background:#f2f2f2;"><td><b>Upload Image [optional]</b><p style="float:right; color:red;" id="postImageErrorMsg"></p></td></tr>
       <tr style="background:#f2f2f2;"><td>
        <input type="file" id="fileChooser" name="fileToUpload" multiple accept='image/*'   onclick="return(postImageErrorMsgDelete());"></td></tr>
        <!--<tr><td><span><input type="checkbox" name="noImage" value="noPhoto">&nbsp;If there is no Image to upload, please select this checkbox.</span></td></tr>-->
      <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
        <tr style="background:#f2f2f2;"><td><b>Post Content</b><p style="float:right; color:red;" id="postContentErrorMsg"></p></td></tr>
        <tr><td><textarea class="ckeditor" name="postContent" onkeydown="return(postContentErrorMsgDelete());"></textarea></td></tr>
        <tr><td style="float:right;"><input type="submit" value="submit" name="submit" class="btn btn-primary"></td></tr>
    </table>			
	</form>				
		<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
	</body>
</html>