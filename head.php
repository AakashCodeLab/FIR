<?php 
//session_start();
?>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="900">
  <tbody>
  <tr>
    <td>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<table border="0" cellpadding="0" cellspacing="0" width="900">
<tbody><tr>
<td colspan="15">
<img src="images/fir.gif" height="109" width="900"></td>
</tr>


</tbody></table>

<?php
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin-role') {
?>
<table border="0" cellpadding="0" cellspacing="0" width="900">
  <tbody><tr style="height:25px;">
    <td bgcolor="#E2E2E2" width="4">&nbsp;</td>
    <td bgcolor="#E2E2E2" width="240">&nbsp;<b>Complainer Menu</b></td>
</tbody>
</table>
<?php 
}
?>
<table border="0" cellpadding="0" cellspacing="0" width="900">
  <tbody><tr style="height:25px;">
    <td bgcolor="#99CCFF" width="4">&nbsp;</td>
    <td bgcolor="#99CCFF" width="350">&nbsp;</td>
    <td bgcolor="#99CCFF" width="130"><div align="center"><a href="admin.php" class="headtext13"></a></div></td>
    <td bgcolor="#99CCFF" width="10"></td>
    <td bgcolor="#99CCFF" width="162"><div align="center"><a href="indexf.php" class="headtext13">Home</a> </div></td>
    <td bgcolor="#99CCFF" width="7">|</td>
    <td bgcolor="#99CCFF" width="125"><div align="center"><a href="process.php?action=logOut" class="headtext13">Logout</a></div></td>
  </tr>
</tbody>
</table>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       