<?php
require_once './library/configf.php';
require_once './library/functionsf.php';

//$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$mod = (isset($_GET['mod']) && $_GET['mod'] != '') ? $_GET['mod'] : '';
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	if($mod == 'super'){
	switch ($view) {
	
		case 'compDetails' :
			$content 	= 'adminCompDetails.php';		
			$pageTitle 	= 'FIR Management System - View Complains Detail';
		break;
		
		case 'compCloseDetails' :
			$content 	= 'adminCompCloseDetails.php';		
			$pageTitle 	= 'FIR Management System - View Close Complains';
		break;
		
		
		case 'viewByCompID' :
			$content 	= 'viewByCompID.php';		
			$pageTitle 	= 'Complain Management System - Give Your Complains';
		break;
		
	
	}//switch
}//if

require_once './include/template.php';

?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       