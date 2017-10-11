<?php require_once("../admin/includes/header.php"); ?>
<?php 
$target_dir = "../admin/upload/";// image directory 
?>
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
						<li><a href="" class="ancherLink">TechNews</a></li>
						<li><a href="worldnews.php" class="ancherLink">WorldNews</a></li>	
                        <li><a href="contact.php" class="ancherLink">Contact</a></li>		
					</ul>
				</nav>
			</header>
			<div id="main">
			    <div id="content">
                   <!--PHP code start to pull the data from the database-->
						
				<?php
              $query = "SELECT * FROM technews ORDER BY id DESC ";          
              $selectQuery = mysqli_query ($connection, $query);   
              if(!$selectQuery){
              die("Query Failed!!" . mysqli_error($connection));
            }
            
                    
                while($rows = mysqli_fetch_assoc($selectQuery)){
                        $db_id = $rows['id'];
                        $db_technewsTitle = $rows['technewstitle'];
                        $db_technewsAuthor = $rows['technewsauthor'];
                        $db_technewsDate = $rows['technewsdate'];
                        $db_technewsImages = $rows['technewsimages'];
                        $db_technewsContent = $rows['technewscontent'];
                ?>
    
       <article class="article1">
        <header class="articleHeader">
            <h2 class="title"><a href="#"><?php echo $db_technewsTitle; ?></a></h2>
            <span><b>Created By: </b><?php echo $db_technewsAuthor; ?> <b>on</b> <?php echo $db_technewsDate;  ?> </span>
        </header>
          <div style="float:right; margin-left:15px;">
           <?php
            $displayImage = $target_dir.$db_technewsImages;
            if(file_exists($displayImage)){
                echo "<img src='{$displayImage}' width='250' height='220'>";
            }else{
               
            }
                    
              ?>  
          </div> 
            <span class="more" style="text-align:justify; margin-right:5px;"><br><br>
             <?php echo $db_technewsContent;  ?>
            </span>
					</article>
			
				<?php  }  ?>
                <?php
        if(mysqli_num_rows($selectQuery) <= 0){
            echo "<b>"."Data is empty, please add some data and try again!"."</b>";
            
        }
        ?>
                </div>	
			    
<?php 
    include("sidebar2.php");//sidebar link
 ?>
				
			</div>
			<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
			
	</body>
</html>