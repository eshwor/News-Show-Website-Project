<!DOCTYPE>
<html>
	<head>
		<title>CodeGangProject</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
<style>
    body{
        display: none;
    }
    
</style>
<script>    

   window.onload = function () {
    $('body').fadeIn(500);
    
};     
    window.onbeforeunload = function () {
    $('body').fadeOut(500);
};    
   
 </script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../css/stylesheet.css" type="text/css" />
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">


	</head>
		<body>

		<div id="container">
			<header class="main-header">
				<!--<img id="logo" src="images/logo.png" alt="logo" />-->
				<span id="n">N</span><span id="e">e</span><span id="w">w</span><span id="s">S</span><span id="h">h</span><span id="o">o</span><span id="ws">W</span>
				<nav class="main-nav">
					<ul>
						<li><a href="../index.php"  class="ancherLink">Home</a></li>
						<li><a href="technews.php" class="ancherLink">TechNews</a></li>
						<li><a href="worldnews.php" class="ancherLink">WorldNews</a></li>	
						<li><a href="" class="ancherLink">Contact</a></li>					
					</ul>
				</nav>
			</header>
			<div id="main">
				<div id="content">
					<article class="article1">
						<header class="articleHeader">
							<h3>You can contact to admin anytime on following email ID</h3>
						</header>
						<br><br>
						<p style="min-height:300px;">Here is my email id: <a href="#">work24/7@gmail.com</a></p>
					
					</article>
					
				</div>
<?php 
    include("sidebar2.php");//sidebar link
 ?>
			</div>
			<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
			
	</body>
</html>