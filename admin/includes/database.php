<?php 

define("SERVER", 'localhost');
define("USER", 'root');
define("PASSWORD", '');
define("DATABASE", 'codegangdb');

$connection = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
if(!$connection){
     die("Faied to connection Server and Database!" .  mysqli_error());
}

?>