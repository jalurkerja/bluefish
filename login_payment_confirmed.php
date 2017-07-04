<form id="confirmform" method="POST" action="http://www.bumantara-ts.com/dev/bluefish.co.id/login_payment_confirmed.php?sessid=<?php echo $_GET["sessid"]; ?>">
	<input type='hidden' name='confirmpayment' value='1'>
	<input type='hidden' name='username' value="<?php echo $_POST["username"]; ?>">
	<input type='hidden' name='password' value="<?php echo $_POST["password"]; ?>">
</table>
<script language="javascript">confirmform.submit();</script>