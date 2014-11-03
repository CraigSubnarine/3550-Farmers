<?php
	include 'lib.php';
    register(connect());
    header("Location: ../Farmers/");
	exit();

//    $loginData = array(
//           'username'=>$_POST['username'],
//           'password'=>$_POST['password']
//    );
//    $url="../Farmers/test.php";
//    echo "<br/> sending post: ".$_POST['username']." ".$_POST['password'];
//    echo sendPost($url, $loginData);
//    echo "<br/> what now?";

