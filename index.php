<?php require_once("admin/includes/header.php"); ?>
<?php 
$target_dir = "admin/upload/";// image directory 
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
    
    #n,#e,#w,#s,#h,#o,#ws{
        display: none;
    } 
    #content{
        display: none;
    }
</style>
<script>    

   window.onload = function () {
    $('body').fadeIn(1000);
    $("#n,#e,#w,#s,#h,#o,#ws").slideDown(2000);
        $("#content").fadeIn(2000);
    
};  
         
 </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
<meta charset="utf-8"/>
<meta name="keywords" content="news,newsplan,newsprogram,newsshow,newshow,localnews,technews">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--This Jquery link for readMore -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	</head>
		<body>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<div id="container">
			<header class="main-header">
				<!--<img id="logo" src="images/logo.png" alt="logo" />-->
				<span id="n">N</span><span id="e">e</span><span id="w">w</span><span id="s">S</span><span id="h">h</span><span id="o">o</span><span id="ws">W</span>
				<nav class="main-nav">
					<ul>
                    <li><a href=""  class="ancherLink">Home</a></li>
                    <li><a href="pages/technews.php" class="ancherLink">TechNews</a></li>
                    <li><a href="pages/worldnews.php" class="ancherLink">WorldNews</a></li>	
                    <li><a href="pages/contact.php" class="ancherLink">Contact</a></li>
                	</ul>
				</nav>
			</header>
			<div id="main">
			    <div id="content">
                   <!--PHP code start to pull the data from the database-->
						
				<?php                     
              $query = "SELECT * FROM technews ORDER BY RAND() LIMIT 0,6 ";
              $selectQuery = mysqli_query ($connection, $query);  
                $count = mysqli_num_rows($selectQuery);
            
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
            <h2 class="title"><a href="pages/technews.php"><?php echo $db_technewsTitle; ?></a></h2>
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
             <?php 
                  $getStringLength = strlen($db_technewsContent);
                   
                if($getStringLength > 200 ){
                   echo substr($db_technewsContent,0,200)."                                  ....<a href='pages/worldnews.php' style='color:coral;'>ReadMore</a>";
                }
                else{
                    echo $db_technewsContent;
                }  
                      ?>
          
					</article>
			
				<?php  }  ?>
				<?php
              $query = "SELECT * FROM worldnews ORDER BY RAND() LIMIT 0,6 "; 
              $selectQuery = mysqli_query ($connection, $query);   
              if(!$selectQuery){
              die("Query Failed!!" . mysqli_error($connection));
            }
            
                    
                 while($rows = mysqli_fetch_assoc($selectQuery)){
                        $db_id = $rows['id'];
                        $db_worldnewsTitle = $rows['worldnewstitle'];
                        $db_worldnewsAuthor = $rows['worldnewsauthor'];
                        $db_worldnewsDate = $rows['worldnewsdate'];
                        $db_worldnewsImages = $rows['worldnewsimages'];
                        $db_worldnewsContent = $rows['worldnewscontent'];
                ?>
    
       <article class="article1">
        <header class="articleHeader">
            <h2 class="title"><a href="pages/worldnews.php"><?php echo $db_worldnewsTitle; ?></a></h2>
            <span><b>Created By: </b><?php echo $db_worldnewsAuthor; ?> <b>on</b> <?php echo $db_worldnewsDate;  ?> </span>
        </header>
          <div style="float:right; margin-left:15px;">
           <?php
            $displayImage = $target_dir.$db_worldnewsImages;
            if(file_exists($displayImage)){
                echo "<img src='{$displayImage}' width='250' height='220'>";
            }else{
               
            }
                    
              ?>  
          </div> 

             <?php 
                $getStringLength = strlen($db_worldnewsContent);
                   
                if($getStringLength > 200){
                   echo substr($db_worldnewsContent,0,200)."                                        ....<a href='pages/worldnews.php' style='color:coral;'>ReadMore</a>";
                }
                else{
                    echo $db_worldnewsContent;
                }  
                ?>
                </article>
			
				<?php  }  ?>
               
<!--display worldnews-->
              
               
                <?php
        if(mysqli_num_rows($selectQuery) <= 0){
            echo "<b>"."Data is empty, please add some data and try again!"."</b>";
            
        }
        ?>
                </div>	
			    
<?php 
    include("pages/sidebar.php");//sidebar link
 ?>
				
			</div>
			<footer style="height:200px;">
			<p>Copyright&copy;<?php echo date("Y"); ?> || New<b>S</b>howProgram</p>
			<span style="padding:10px; margin-left:10px;"><div style="background:#FFFFFF; padding:10px;" class="fb-like" data-href="http://newshowprogram.com" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></span>
			</footer>
		</div>
			
	</body>
</html>



