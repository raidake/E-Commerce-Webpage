<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","retailers");
if (mysqli_connect_errno()){
	die('Could not connect: ' . mysqli_connect_errno());
}
$user = $_POST['iuser'];
$pwd = $_POST['ipwd'];
$company_name = $_POST['icomp'];
$email = $_POST['imail'];
$number = $_POST['inumber'];
$address = $_POST['iaddr'];
$description = $_POST['idesc'];

$query= $con->prepare("INSERT INTO `retailers` ( `retails_ID`, `username`, `password`, `company_Name`, `e-mail`, `phone_Number`, `address`, `description`) VALUES
(NULL, ?,?,?,?,?,?,?)");
$query->bind_param('sssssss', $user, $pwd, $company_name, $email, $number, $address, $description);
if ($query->execute()){
	echo "Query executed.";
}
else{
	echo "Error executing query.";
}
?>
</body>
</html>