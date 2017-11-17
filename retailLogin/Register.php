<html>
<head>
    <title>Company Registration</title>
    <style type="text/css">@import "styles.css";
    .container {
        width: 500px;
        clear: both;
    }
    .container input {
        width: 100%;
        clear: both;
    }
	body {font-family: Arial;}
	</style>
</head>
	<body>
	<?php include("Header.php");?>
	<div class="container">
	<form action="input_Register.php" method="post" autocomplete="off">
	Username: <input type="text" name="iuser" /> <br />
	Password: <input type="password" name="ipwd" /> <br />
	Company Name: <input type="text" name="icomp" /> <br />
	E-Mail: <input type="text" name="imail" /> <br />
	Contact Number: <input type="text" name="inumber" /> <br />
	Company Address: <input type="text" name="iaddr" /> <br />
	Company Description: <input type="text" name="idesc" /> <br />
	<input type="submit" value="Register" />
	</form>
	
</body>
</html>