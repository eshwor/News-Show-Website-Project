<?php include("../includes/database.php");
$target_dir = "../upload/";
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE>
<html>
	<head>
		<title>CodeGangProject</title>
		<script type="text/javascript" src="../javascript/javascript.js"></script>
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
	            <th><a href="technews.php">TechNews</a></th>
	            <th><a href="worldnews.php">WorldNews</a></th>
	            <th><a href="contact.php">Contact</a></th>
	        </thead>
	    </tbody>
	</table>	
		
<!--Table End From Here-->			
<!--PHP code start From Here-->	
<?php
  $query = "SELECT * FROM technews ORDER BY id DESC ";          
  $selectQuery = mysqli_query ($connection, $query);   
if(!$selectQuery){
    die("Query Failed!!" . mysqli_error($connection));
}
          
?>   
<?php 
  if(isset($_GET['delete'])){
     $getIdForDelete = $_GET['delete'];
      $sql = "SELECT technewsimages FROM technews WHERE id = {$getIdForDelete} ";
      $result = mysqli_query($connection, $sql);
      while($rows = mysqli_fetch_assoc($result)){
          $photo = $rows['technewsimages'];
      }
      $deleteSql = "DELETE FROM technews WHERE id = {$getIdForDelete} ";
      unlink($target_dir . $photo);
      $query = mysqli_query($connection, $deleteSql);
      header("Location:technews.php");
  }
    
?>         
<!--PHP code End From Here-->	
<a style="color:#FFFFFF;" href="../postspages/technewsadd.php"><button type="button" style="float:right; padding:2px 10px 2px 10px; font-size:15px;" class="btn btn-primary">Add New TechNews</button></a>
  <span class="label label-info">Your are in TechNews Page </span>
    <table class="table table-striped table-hover table-bordered" style="text-align:center;">

        <tbody>
            <thead>
                <th style="text-align:center;">Id</th>
                <th style="text-align:center;">TechNewsTitle</th>
                <th style="text-align:center;">Author</th>
                <th style="text-align:center;">Date</th>
                <th style="text-align:center;">Images</th>
                <th style="text-align:center;">TechNewsContents</th>
                <th colspan="2" style="text-align:center;">Actions</th>
            </thead>
            <tr>
    <!--php code-->
    <?php 
      while($rows = mysqli_fetch_assoc($selectQuery)){
        $db_technewsid = $rows['id'];
        $db_technewsTitle = $rows['technewstitle'];
        $db_technewsAuthor = $rows['technewsauthor'];
        $db_technewsDate = $rows['technewsdate'];
        $db_technewsImages = $rows['technewsimages'];  
        $db_technewsContent = $rows['technewscontent'];
    
    ?>    
    <!--php code end -->
            <td><?php echo $db_technewsid; ?></td>
            <td><?php echo substr($db_technewsTitle,0,20); ?></td>
            <td><?php echo $db_technewsAuthor; ?></td>
            <td><?php echo $db_technewsDate; ?></td>
             <td>
              <?php
            $displayImage = $target_dir . $db_technewsImages;
            if(file_exists($displayImage)){
                echo "<img src='{$displayImage}' width='50' height='40'> ";
            }else{
                echo "No Image";
            }
                ?>
         
             </td>
            <td><?php echo substr($db_technewsContent,0,20); ?></td>
            <td><a href="technews.php?delete=<?php echo $db_technewsid;  ?>">Delete</a></td>
            <td><a href="../postspages/technewsedit.php?edit=<?php echo $db_technewsid; ?>">Edit</a></td> 
            </tr>      
            
            <?php  }  //end of while loops  ?>
            
            </tbody>
      <?php
        if(mysqli_num_rows($selectQuery) <= 0){
            echo "<b>"."There is no data records in Database!"."</b>";
        }
        ?>
    </table>			
		
	
			
		<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
			
	</body>
</html>