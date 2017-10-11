<?php include("../includes/header.php"); ?>

<!DOCTYPE>
<html>
	<head>
		<title>CodeGangProject</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" />
		<meta charset="utf-8"/>
		<meta type="viewport" content="width=device-width" />
<script type="text/javascript">
function conformForDelete(){
       var confirmation = confirm("Are you sure to delete this post ?");
    if(confirmation){
        return true;
    }
    else{
        return false;
    }
}
</script>
		
	</head>
		

	<body>

		<div id="container">
			<header class="main-header">
				<img id="logo" src="../../images/logo.png" alt="logo" />
				<nav class="main-nav">
					<ul>
						<li><a href="../index.php"  class="active">Home</a></li>
						<li><a href="adminstrator.php">Adminstrator</a></li>
						<li><a href="posts.php">Posts</a></li>	
						<li><a href="sideBarPosts.php">SideBarPosts</a></li>
						<span style="float:right;"><li><a href="../logout.php">LogOut</a></li></span>			
					</ul>
				</nav>
			</header>
            <br>
              <span class="label label-info">You are in Sidebar Posts </span>
              <a style="color:#FFFFFF;" href="../postspages/sidebaraddpost.php"><button type="button" style="float:right; padding:2px 10px 2px 10px; font-size:15px;" class="btn btn-primary">Add New Post</button></a>
              <br><br>
        <table class="table table-striped table-hover table-bordered" style="text-align:center;">
        <tbody>
            <thead>
                <th style="text-align:center;">ID</th>
                <th style="text-align:center;">Title</th>
                <th style="text-align:center;">Content</th>
                 <th style="text-align:center;" colspan="2">Actions</th>
            </thead>
<!--php code-->
<!--this php code for deleting the post-->
<?php 
  if(isset($_GET['delete'])){
   
      $getIdForDelete = $_GET['delete'];
      $delSql = "DELETE FROM sidebarposts WHERE id = {$getIdForDelete} ";
      $delResult = mysqli_query($connection,$delSql);
      header("Location:sideBarPosts.php");
   
      
     
  }
?>
 <!--this php code for deleting the post end--> 
    <?php
$selectData = "SELECT * FROM sidebarposts ";
$result = mysqli_query($connection,$selectData);
while($rows = mysqli_fetch_assoc($result)){
    $sidebarId = $rows['id'];
    $sidebarPostTitle = $rows['sidebarposttitle'];
    $sidebarPostContent = $rows['sidebarpostcontent'];
?> 
                <tr>
                    <td><?php echo $sidebarId; ?></td>
                    <td><?php echo substr($sidebarPostTitle,0,30); ?></td>
                    <td><?php echo substr($sidebarPostContent,0,50); ?></td>
                    <td><a onclick="return(conformForDelete());" href="sideBarPosts.php?delete=<?php echo $sidebarId; ?>" >Delete</a></td>
                    <td><a href="../postspages/sidebareditpost.php?edit=<?php echo $sidebarId; ?>">Edit</a></td>
                </tr>
<?php } ?>
        </tbody> 

        <th style="text-align:center; padding:0px;" colspan="5">             
<?php
    $count = mysqli_num_rows($result);
               
if($count <= 3){
    if($count <= 0){
        echo "<p style='color:white; background-color:red;'>Please Add Atleast 3 Records</p>";
    }else{
        echo "<p style='color:white; background-color:green;'>Normal Status</p>";
    }
    
}else{
    echo "<p style='color:white; background-color:red;'>No, You Cannot Display More Than 3 Sidebar Post, Please Delete Rest of All</p>";
}

?>
            </th>
    </table>
    
		<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
			<p>
        <?php 
           
                
        ?>
        
        </p>
	</body>
</html>