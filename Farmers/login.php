<?php
	session_start();
	include 'lib.php';
	login(connect());
	echo "logged In";
	header("Location: ../Farmers/");
	exit();