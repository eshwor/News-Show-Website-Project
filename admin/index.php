<?php session_start(); ?>
<?php
if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
}

?>
<!DOCTYPE>
<html>
	<head>
		<title>CodeGangProject</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/stylesheet.css" type="text/css" />
		<meta charset="utf-8"/>
		<meta type="viewport" content="width=device-width" />
		
	</head>
		

	<body>

		<div id="container">
			<header class="main-header">
				<img id="logo" src="../images/logo.png" alt="logo" />
				<nav class="main-nav">
					<ul>
						<li><a href=""  class="active">Home</a></li>
						<li><a href="pages/adminstrator.php">Adminstrator</a></li>
						<li><a href="pages/posts.php">Posts</a></li>	
						<li><a href="pages/sideBarPosts.php">SideBarPosts</a></li>
						<span style="float:right;"><li><a href="logout.php">LogOut</a></li></span>			
					</ul>
				</nav>
			</header>
			
<!--login-->
      <p><?php echo "Welcome To: " . $_SESSION['fullname']; ?></p>
	
		</div>
			
	</body>
</html>