<?php require_once("../admin/includes/header.php"); ?>
<?php
if(!$connection){
    die("connection failed" . mysqli_error());
}

//display data from the database
$sidebarposts = "SELECT * FROM sidebarposts LIMIT 3";
$displayResult = mysqli_query($connection,$sidebarposts);
if(!$displayResult){
    die("Query failed!" . mysqli_error());
}
?>

  <div id="sideBar">
   <div class="block">
            <h2>Admin Login </h2>
        <form method="post" action="admin/login.php">
          <div class="form-group">
              <label for="username">Enter Your Admin User Name:</label><br>
            <input type="text" name="username" class="form-control" placeholder="adminusername" required/>
          </div>
          <div class="form-group">
            <label for="password">Enter Your Password:</label><br>
            <input type="password" name="password" class="form-control" placeholder="password" required/>
          </div>
         <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>


<?php
//pull all the data with using while loops
while($rows = mysqli_fetch_assoc($displayResult)){
    $sidebarid = $rows['id'];
    $sidebartitle = $rows['sidebarposttitle'];
    $sidebarcontent = $rows['sidebarpostcontent'];

?> 
        <div class="block">
            <h2><?php echo $sidebartitle; ?></h2>
            <p><?php echo $sidebarcontent; ?></p>
        </div>
<?php } ?>

</div>
				 