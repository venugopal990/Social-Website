<?php
ob_start();//buffer output
session_start(); 

$con = mysqli_connect("localhost","root","","social"); //connection
if(mysqli_connect_error()){
	echo"Failed to connect ". mysqli_connect_error();
}

?>