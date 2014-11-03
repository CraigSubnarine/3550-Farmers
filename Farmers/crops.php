<?php
    session_start();
	include 'lib.php';
	function addCrop(){
		$sql="";
		if(isset($_POST['crop']))
            $sql='INSERT INTO `crop_manager`.`crops` (`id` ,
                `farmer` ,
                `crop` ,
                `date` ,
                `amount`
                ) VALUES (NULL , \''.$_SESSION['id'].'\' , \''.$_POST['crop'].'\', \''.$_POST['date'].'\', \''.$_POST['amount'].'\');';
		else echo'No post request found!';
		$con=connect();
		//echo $sql;
		if($con->query($sql))echo'record inserted successfully!';
		header("Location: ../Farmers");
		exit();
	}
	
	function getCrops(){
		$sql="";
		$cropRec = array();
		if(isset($_SESSION['id']))$sql=" SELECT `crops`.`crop` , `crops`.`date` , `crops`.`amount` , `farmers`.`username` FROM crops LEFT JOIN `crop_manager`.`farmers` ON `crops`.`farmer` = `farmers`.`id`;";
		else echo'No get request found!';
		$con=connect();
		$result=$con->query($sql);
		if($result) while($row=$result->fetch_assoc()) array_push($cropRec,$row);
		foreach($cropRec as $key=>$value)echo json_encode($value);
	}

	switch($_SERVER['REQUEST_METHOD']){
		case 'GET': getCrops(); break;
		case 'POST': addCrop(); break;
		default: echo 'no request!';
	}