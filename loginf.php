<?php


$errorMessage = '&nbsp;';
require_once './library/configf.php';
require_once './library/functionsf.php';

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>


<html>
<head>
<title>Online FIR- Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/admin.css" rel="stylesheet" type="text/css">


<style type="text/css">

  input:required:invalid, input:focus:invalid {
    background-image: url(invalid.png);
    background-position: right top;
    background-repeat: no-repeat;
    -moz-box-shadow: none;
  }
  input:required:valid {
    background-image: url("valid.png");
    background-position: right top;
    background-repeat: no-repeat;
  }

</style>






</head>
<body>
<br/>
<br/>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
 <tr> 
  <td><img src="images/fir.gif" width="900" height="100"></td>
 </tr>
 <tr> 
  <td valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="20">
    <tr><td><image src="1920.jpg" width="500" height="600"/></td> 
     <td class="contentArea"> <form method="post" name="frmLogin" id="frmLogin">
       <p>&nbsp;</p>
       <table width="500" height="500" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#336699" class="entryTable">
        <tr id="entryTableHeader"> 
         <td>:: User Login ::</td>
        </tr>
        <tr> 
         <td> 
		 <div class="errorMessage" align="center"><?php echo $errorMessage; ?></div>

		  <table width="100%" height="400" border="0" cellpadding="2" cellspacing="1" class="text">
           <tr align="center"> 
            <td colspan="3">&nbsp;</td>
           </tr>
           <tr class="text"> 
            <td width="20" align="right"><h4>User Name</h4></td>
            <td width="30" align="center"><h4>:</h4></td>
            <td><input name="txtUserName" type="text" required="required" class="box" id="txtUserName" placeholder="Enter Username" width ="200" size="30" maxlength="40"></td>
           </tr>
           <tr class="pass">
             <td align="right"><h4>Password</h4></td>
             <td align="center"><h4>:</h4></td>
             <td><input name="txtPassword" type="password" required="required"  placeholder="Enter Your Password"class="box" id="txtPassword" size="30" maxlength="40"></td>
           </tr>
           <tr> 
            <td width="100" align="right"><h4>User Type</h4> </td>
            <td width="10" align="center"><h4>:</h4></td>
            <td><label>
              <select name="utype"  placeholder="Select UserType"class="box">
			  <option >&nbsp;&nbsp;--- Select User --- &nbsp;</option>
			  <option value="complainer">&nbsp;&nbsp; Complainer &nbsp;</option>
			  <option value="police">&nbsp;&nbsp; Police Inspector &nbsp;</option>
			  <option value="superintend">&nbsp;&nbsp; Police Superintend &nbsp;</option>
              </select>
              </label></td>
           </tr>
           <tr>
             <td colspan="2">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td colspan="2">&nbsp;</td>
             <td><div align="right"><h3>For New Complainer &nbsp;<a href="registerf.php">Register Here</a></h3> </div></td></br>
         </tr><tr>
             <td colspan="2">&nbsp;</td><td><div align="right"><h3>&amp For Forgot Password &nbsp;<a href="forget-passwordf.php">Forget Password</a></h3> </div></td>
             </tr>
           <tr> 
            <td colspan="2">&nbsp;</td>
            <td><input name="btnLogin" type="submit" id="btnLogin" value=" Login Now " style="font-size:14px;color:#0066FF;padding:5px 8px;"></td>
           </tr>
          </table></td>
        </tr>
       </table>
       <p>&nbsp;</p>
      </form></td>
    </tr>
   </table></td>
 </tr>
</table>
</body>
</html>