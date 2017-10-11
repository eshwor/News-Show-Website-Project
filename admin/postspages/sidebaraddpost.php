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
<!--javascript form validation-->
<script type="text/javascript">
function sbformValidation(){
   if(document.sidebaradd.sbTitle.value == ""){
       document.getElementById('titleErrorMsg').innerHTML = "Please, Fill Up The Post Title!";
       document.sidebaradd.sbTitle.focus();
       return false;
   } 
    if(document.sidebaradd.sbContent.value == ""){
      document.getElementById('contentErrorMsg').innerHTML = "Please, Fill Up The Post Content!";
       document.sidebaradd.sbContent.focus();
       return false;
   } 
return true;
} 
//deleting the error message after keybord down
function titleErrorMsgDelete(){
document.getElementById("titleErrorMsg").innerHTML = "";
return true;
}
function contentErrorMsgDelete(){
document.getElementById("contentErrorMsg").innerHTML = "";
return true;
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
						<li><a href="../pages/adminstrator.php">Adminstrator</a></li>
						<li><a href="../pages/posts.php">Posts</a></li>	
						<li><a href="../pages/sideBarPosts.php">SideBarPosts</a></li>			
					</ul>
				</nav>
			</header>
          <!--php code-->
           <?php 
if(isset($_POST['submit'])){
   $sidebarTitle = $_POST['sbTitle'];
   $sidebarContent = $_POST['sbContent'];
//filtering input before uploading to database
    $sidebarTitles = mysqli_real_escape_string($connection,$sidebarTitle);
    $sidebarContents = mysqli_real_escape_string($connection,$sidebarContent);
    //another validation
    $filter_sidebarTitle = filter_var($sidebarTitles,FILTER_SANITIZE_STRING);
     $filter_sidebarContent = filter_var($sidebarContents,FILTER_SANITIZE_STRING);
    
//insert data to database
    $sbInsert = "INSERT INTO sidebarposts (sidebarposttitle,sidebarpostcontent) ";
    $sbInsert .= "VALUES('{$filter_sidebarTitle}','{$filter_sidebarContent}') "; 
    $result = mysqli_query($connection,$sbInsert);
    if($result){
         echo "Inserting Data, Please wait....."."&nbsp&nbsp"."<img  style='width:5%; height:5%;' src='../image/redirecting.gif'>";         
     }else{
         die("Failed Query!" . mysqli_error($connection));
     }
     //header("Location:addposts.php");
     header("refresh:2;../pages/sideBarPosts.php");
}else{
    unset($_POST);
}
?>
<br>
             <span class="label label-info">You are in Sidebar Add Posts </span>
              <a style="color:#FFFFFF;" href="../pages/sideBarPosts.php"><button type="button" style="float:right; padding:2px 10px 2px 10px; font-size:15px;" class="btn btn-primary">Back To Post</button></a>
              <br><br>
        <form action="" class="form-group" method="post" name="sidebaradd" onsubmit="return(sbformValidation());">
        <table class="table table-striped table-hover table-bordered">
        <th style="text-align:center;"><h3>Create New SideBar Post</h3></th>
        <tr style="background:#f2f2f2;"><td><b>Title</b><p style="float:right; color:red;" id="titleErrorMsg"></p></td></tr>
        <tr><td><input type="text" class="form-control" name="sbTitle" onkeydown="return(titleErrorMsgDelete());"></td></tr>
        <tr style="background:#f2f2f2;"><td><b>Content</b><p style="float:right; color:red;" id="contentErrorMsg"></p></td></tr>
         <tr><td><textarea rows="7" class="form-control" name="sbContent" onkeydown="return(contentErrorMsgDelete());"></textarea></td></tr>
        <tr><td style="float:right;"><input type="submit" value="submit" name="submit" class="btn btn-primary"></td></tr>
    </table>			
	</form>				
    
		<footer><p>Copy right by Ishwor 2017</p></footer>
		</div>
			
	</body>
</html>