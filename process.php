<?php 
//start session
session_start();

require_once('database.php');

$action = $_GET['action'];

switch($action) {
	case 'add-fir':
		addfir();
	break;
	
	case 'close':
		markClose();
	break;
	
	case 'update-status':
		updateStatus();
	break;
	
	case 'change-pass':
		changePass();
	break;
			
	case 'logOut':
		logOut();
	break;		
	
}//switch

function addfir(){

	//$complainername = $_POST['complainername'];
	$cphone = $_POST['complainerphone'];
	$add = $_POST['complaineraddress'];
	$dt_occur = $_POST['occurred'];
	
	$FirNo = $_POST['FirNo'];
	$cr_type = $_POST['crtype'];

	$pstn = $_POST['Stnname'];

	

	$status = $_POST['status'];
	$discription = $_POST['disc'];
	$complainer_id = (int)$_SESSION['user_id'];
	$complainer_name = $_SESSION['user_name'];
	
	
$sql="INSERT INTO fir( cid, cname, c_phone, co_id, cr_type, cr_desc, dt_occurrence, address, status, pid, pname, pstn, comment, create_date)
 VALUES ('$complainer_id','$complainer_name','$cphone','$FirNo','$cr_type','$discription','$dt_occur','$add','$status','','','$pstn','',NOW())";
	
	
	//echo $sql;
	dbQuery($sql);
	header('Location: fir-add-success.php'); 
	
	//echo $Ship;
}//addComplain


function markClose(){

$cons= $_POST['Consignment'];

$sql = "UPDATE fir
		SET status ='Close'
		WHERE co_id= '$cons'";
dbQuery($sql);
header('Location:closing-success.php');
}



function updateStatus() {
	
	//$OfficeName = $_POST['pstn'];
	$status = $_POST['status'];
	$comments = $_POST['comments'];
	$cid = (int)$_POST['cid'];
	
	$sql_1 = "UPDATE fir 
				SET status = '$status'
				
				WHERE fid = $cid";
	dbQuery($sql_1);
	$sql_2 = "UPDATE fir 
				SET comment = '$comments'
				
				WHERE fid = $cid";
	dbQuery($sql_2);
    
    	
	
	header('Location: update-success.php');

}



function logOut(){
	if(isset($_SESSION['user_name'])){
		unset($_SESSION['user_name']);
	}
	if(isset($_SESSION['user_type'])){
		unset($_SESSION['user_type']);
	}
	session_destroy();
	header('Location: loginf.php');
}//logOut

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                