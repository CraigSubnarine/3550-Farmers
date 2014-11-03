<?php
    ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	function connect(){
		$con = new mysqli("localhost","crop_manager","simplePass","crop_manager");
		if($con->errno){
            echo "Connection to DB failed!";
            return null;
        }
        //echo "connection successful";
		return $con;
	}

	function login($con){
		if (isset($_POST['username'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM farmers WHERE username = '$username';";
			echo $sql;
			if($con)echo '<br/>db access successful!';
			$result = $con->query($sql);
			if($result){
				echo '<br/>query ran successfully!';
				$row = $result->fetch_object();
				if ($row){
					$password = sha1($password);
					if ($row->password == $password){
						$_SESSION['username'] = $row->username;
						$_SESSION['firstname'] = $row->firstname;
						$_SESSION['lastname'] = $row->lastname;
						$_SESSION['id'] = $row->id;
						echo '<br/>'.$_SESSION['username'].' logged in!';
					}else{
						echo "incorrect password";
					}
				}else{
					echo "username does not exist";
				}
			}
		}
		else echo'No Post Request Recieved!';
	}

    function register($con){
        $sql="";
        if(isset($_POST['username'])){
            $sql = 'INSERT INTO `crop_manager`.`farmers`(
            `id` ,
            `firstname` ,
            `lastname` ,
            `address` ,
            `username` ,
            `password`
            ) VALUES (
            NULL , 
            \''.$_POST['firstname'].'\', 
            \''.$_POST['lastname'].'\', 
            \''.$_POST['address'].'\', 
            \''.$_POST['username'].'\', 
            \''.sha1($_POST['password']).'\'
            );';
        }
        else 
            echo'No post request found!';
        if($con->query($sql))
            echo'record inserted successfully!';
        else 
            echo"query failed";
    }

    function sendPost($url, $data){

        $postURL='';
        $sep='';
        foreach($data as $key=>$value) 
        { 
           $postURL.= $sep.urlencode($key).'='.urlencode($value); 
           $sep='&'; 
        }

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch,CURLOPT_POST,count($postURL));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postURL);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
                    
        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }

?>