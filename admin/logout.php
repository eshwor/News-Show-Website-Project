<?php session_start(); ?>
<?php session_destroy(); ?>

<?php 
$_SESSION = Null;
header("Location: ../index.php");

?>