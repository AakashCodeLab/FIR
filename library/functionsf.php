<?php

/*
	Check if a session user id exist or not. If not set redirect
	to login page. If the user session id exist and there's found
	$_GET['logout'] in the query string logout the user
*/
function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['user_id'])) {
		header('Location: ' . WEB_ROOT . 'loginf.php');
		exit;
	}
	
	// the user want to logout
	if (isset($_GET['logOut'])) {
		doLogout();
	}
}

/*
	
*/
function doLogin()
{
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	$uType    = $_POST['utype'];
	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	} else {
		
		//check if user is complainer
		if($uType == 'complainer')
		{
			$sql = "SELECT  cid, cname
					FROM complainer
					WHERE cname = '$userName' AND cpass = '$password'";
			$result = dbQuery($sql);
			if (dbNumRows($result) == 1) {
				$row = dbFetchAssoc($result);
				$_SESSION['user_id'] = $row['cid'];
				$_SESSION['user_name'] = $row['cname'];
				$_SESSION['user_type'] = $uType;
				header('Location: '.WEB_ROOT.'indexf.php');
			exit;
			}//if
			else{
				$errorMessage = 'Username or Password is not Valid. Please try again.';
			}
					
		}//if
		elseif($uType == 'police')
		{
			$sql = "SELECT  pid, pname
					FROM police_inspector
					WHERE pname = '$userName' AND ppass = '$password'";
			$result = dbQuery($sql);
			if (dbNumRows($result) == 1) {
				$row = dbFetchAssoc($result);
				$_SESSION['user_id'] = $row['pid'];
				$_SESSION['user_name'] = $row['pname'];
				$_SESSION['user_type'] = $uType;
				header('Location: '.WEB_ROOT.'policef.php');
			exit;
			}//if
			else{
				$errorMessage = 'Username or Password is not Valid. Please try again.';
			}
					
		}
		elseif($uType == 'superintend'){
			//$_SESSION['user_id'] = $row['sid'];
			if($userName == 'aakash' && $password == 'aakash123'){
				$_SESSION['user_id'] = 0;
				$_SESSION['user_name'] = 'Superintend';
				$_SESSION['user_type'] = 'superintend';
				header('Location: '.WEB_ROOT.'superf.php');
				exit;
			}
			else {
				$errorMessage = 'You are Not an police superintend. Please Login using another Role.';
			}//else
		}//if Admin
		else {
			$errorMessage = 'Username or Password is not Valid. Please try again.';
		}//else		
			
	}//else
	return $errorMessage;
}
/*
	Register
*/

function doRegister()
{
	// if error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	$utype = $_POST['utype'];
	$txtAdd = $_POST['txtAdd'];
	$txtMob = $_POST['txtMob'];
	$txtEmail = $_POST['Email'];
	
	
	// first, chk username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	}else if ($txtAdd == '') {
		$errorMessage = 'You must enter the Address';
	}else if ($txtMob == '') {
		$errorMessage = 'You must enter the Mobile No.';
	}else if (strlen($txtMob) < 10) { 
		$errorMessage = 'Mobile No. must contain 10 digits';
	}else if ($txtEmail == '') {
		$errorMessage = 'You must enter the E-mail.';
	}else {
		// check the database and see if the username and password both do match
		if($utype == 'complainer'){
			
			$sql = "SELECT cname
					FROM complainer
					WHERE cname = '$userName'";
			$result = dbQuery($sql);
			if (dbNumRows($result) == 1) {
				$errorMessage = 'Username already taken. Choose another one';	
			} else {			
				$sql   = "INSERT INTO complainer (cname, cpass, address, email, c_mobile, date_time)
						  VALUES ('$userName', '$password', '$txtAdd','$txtEmail','$txtMob',NOW())";
				dbQuery($sql);
				$errorMessage = 'Registration is Successful. You can Login Now.';
				header('Location: loginf.php');	
			}
		}//if 			
	}//else
	return $errorMessage;
}

/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['user_id'])) {
		unset($_SESSION['user_id']);
		session_unregister('user_id');
	}
	if (isset($_SESSION['user_name'])) {
		unset($_SESSION['user_name']);
		session_unregister('user_name');
	}
	if (isset($_SESSION['user_type'])) {
		unset($_SESSION['user_type']);
		session_unregister('user_type');
	}
		
	header('Location: loginf.php');
	exit;
}
function doChangePassword()
{
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['txtUserName'];
	$email = $_POST['txtEmail'];
	$uType    = $_POST['utype'];
	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($email == '') {
		$errorMessage = 'You must enter the Email';
	} else {
		
		//check if user is complainer
		if($uType == 'complainer')
		{
			$sql = "SELECT  cname, cpass
					FROM complainer
					WHERE cname = '$userName' AND email = '$email'";
			$result = dbQuery($sql);
			if (dbNumRows($result) == 1) {
				$row = dbFetchAssoc($result);
				$npass = $row['cpass'];
				$errorMessage = "Your password is $npass. You can <a href='loginf.php'>Login Now</a>.";	
			}else {
				$errorMessage = "You are not a Valid complainer.";
			}
					
		}//if
		elseif($uType == 'police')
		{
			$sql = "SELECT  pid, pname, ppass
					FROM police_inspector
					WHERE pname = '$userName' AND pmail = '$email'";
			$result = dbQuery($sql);
			if (dbNumRows($result) == 1) {
				$row = dbFetchAssoc($result);
				$npass = $row['ppass'];
				$errorMessage = "Your password is $npass. You can <a href='loginf.php'>Login Now</a>.";
			}else {
				$errorMessage = "You are not a Valid police_inspector.";
			}		
		}
				
			
	}//else
	return $errorMessage;
}


?>