<?php
$connect=mysqli_connect("localhost","root","","tpshop");


if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$itemname=$_POST["itemname"];
		$stock=$_POST["stock"];
		$unitprice=$_POST["unitprice"];
		$costprice=$_POST["costprice"];
		$shortdesc=$_POST["shortdesc"];
		$merchant=$_POST["merchant"];	
		$query=$connect->prepare("insert into item(ITEM_NAME, STOCK, UNITPRICE, COSTPRICE, SHORT_DESC, MERCHANT) values('$itemname', '$stock', '$unitprice', '$costprice', '$shortdesc', '$merchant');");
		if($query->execute())
		{
			echo "<center>Record Inserted!</center><br>";
		}
	}
}

if(isset($_POST["update"])){
	if($_POST["update"]=="yes")
	{
	$itemname=$_POST["itemname"];
	$stock=$_POST["stock"];
	$unitprice=$_POST["unitprice"];
	$costprice=$_POST["costprice"];
	$shortdesc=$_POST["shortdesc"];
	$merchant=$_POST["merchant"];
	
	$query=$connect->prepare("update item set ITEM_NAME='$itemname' , STOCK='$stock', UNITPRICE='$unitprice', COSTPRICE='$costprice', SHORT_DESC='$shortdesc', MERCHANT='$merchant' where ITEM_ID=".$_POST['id']);
	if($query->execute())
	{
		echo "<center>Record Updated!</center><br>";
	}
	}
}

if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$connect->prepare("delete from item where ITEM_ID=".$_GET['id']);
		if($query->execute())
		{
			echo "<center>Record Deleted!</center><br>";
		}
	}
}
?>
<html>
<body>
<b><center>CRUD</center></b>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<td>itemname:</td>
<td><input type="text" name="itemname" /></td>
</tr>
<tr>
<td>stock:</td>
<td><input type="text" name="stock" /></td>
</tr>
<tr>
<td>unitprice:</td>
<td><input type="text" name="unitprice" /></td>
</tr>
<tr>
<td>costprice:</td>
<td><input type="text" name="costprice" /></td>
</tr>
<tr>
<td>shortdesc:</td>
<td><input type="text" name="shortdesc" /></td>
</tr>
<tr>
<td>merchant:</td>
<td><input type="text" name="merchant" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Record"/>
</td>
</tr>
</table>
</form>

<?php
$query=$connect->prepare("select * from item");
$query->execute();
$query->bind_result($id, $itemname,$stock, $unitprice, $costprice, $shortdesc, $merchant, $detail, $image );
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Item Name</th>";
echo "<th>Stock</th>";
echo "<th>UnitPrice</th>";
echo "<th>CostPrice</th>";
echo "<th>ShortDesc</th>";
echo "<th>Merchant</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$id."</td>";
	echo "<td>".$itemname."</td>";
	echo "<td>".$stock."</td>";
	echo "<td>".$unitprice."</td>";
	echo "<td>".$costprice."</td>";
	echo "<td>".$shortdesc."</td>";
	echo "<td>".$merchant."</td>";
	echo "<td><a href='edit.php?operation=edit&id=".$id."&itemname=".$itemname."&stock=".$stock."&unitprice=".$unitprice."&costprice=".$costprice."&shortdesc=".$shortdesc."&merchant=".$merchant."'>edit</a></td>";
	echo "<td><a href='index.php?operation=delete&id=".$id."'>delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";
?>

</body>
</html>