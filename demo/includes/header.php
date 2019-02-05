<?php 
require 'config/config.php';
 if (isset($_SESSION['username'])){
 	$userloggedin=$_SESSION['username'];
 }else{
 	header("Location: register.php");
 }
 ?>

 
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Connectin</title>
	<!--JavaScript Files-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<!--CSS Files-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
