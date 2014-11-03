(function (window){

	$(document).ready(function(){

		$("#regForm").submit(function(){
			var username = $("#username").val();
			var password = $("#password").val();
			if(username === "" || password === "")alert("Username/Password cannot be empty!");
			return false;
		});
		
	});

}(this));

function validateLoginForm(){
    console.log("inside validate");
	var username=document.forms["loginForm"]["username"].value;
	var password=document.forms["loginForm"]["password"].value;
	if(username==null || username=="" || password==null || password == ""){
		  alert("Username/Password cannot be empty!");
		  return false;
	 }
}

function loadTable(){
	console.log("inside load table");
    var xmlhttp;
	if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
	else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    document.getElementById("registerSec").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","cropTable.php",true);
	xmlhttp.send();
}