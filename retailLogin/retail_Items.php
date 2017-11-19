<?php
$connect=mysqli_connect("localhost","root","","retailers");

if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$retails_ID=$_POST["retails_ID"];
		$itemname=$_POST["itemname"];
		$stock=$_POST["stock"];
		$cost=$_POST["cost"];
		$desc=$_POST["desc"];
		$query=$connect->prepare("insert into retail_items(item_Name, item_Description, item_Cost, retails_ID, stock) values('$itemname', '$desc', '$cost', '$retails_ID', '$stock');");
		if($query->execute())
		{
			echo "<center>Record Inserted!</center><br>";
		}
	}
}

if(isset($_POST["update"]))
{
	if($_POST["update"]=="yes")
	{
	$itemname=$_POST["itemname"];
	$stock=$_POST["stock"];
	$cost=$_POST["cost"];
	$desc=$_POST["desc"];
	
	$query=$connect->prepare("update retail_items set item_Name='$itemname' , item_Description='$desc', item_Cost='$cost', stock='$stock' where item_ID=".$_POST['item_ID']);
		if($query->execute())
		{
			echo "<center>Record Updated!</center><br>";
		}
	}
}


if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$connect->prepare("delete from retail_items where item_ID=".$_GET['item_ID']);
		if($query->execute())
		{
			echo "<center>Record Deleted!</center><br>";
		}
	}
}
?>

<?php include("Header.php");?>
<html>
<body>

	<form method="post" action="retail_Items.php">
		
		<table align="center" border="0">
		<tr>
		<td>Item Name:</td>
		<td><input type="text" name="itemname" /></td>
		</tr>
		<tr>
		<td>Stock:</td>
		<td><input type="text" name="stock" /></td>
		</tr>
		<tr>
		<td>Item Cost:</td>
		<td><input type="text" name="cost" /></td>
		</tr>
		<tr>
		<td>Item Description:</td>
		<td><input type="text" name="desc" /></td>
		</tr>
		<tr>
		<td>Retails ID:</td>
		<td><input type="text" name="retails_ID" /></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td align="right">
		<input type="hidden" name="insert" value="yes" />
		<input type="submit" value="Add Item"/>
		</td>
		</tr>
		</table>
	</form>
<?php
$query=$connect->prepare("select item_ID, item_Name, stock, item_Cost, item_Description from retail_items");
$query->execute();
$query->bind_result($item_ID,$itemname,$stock, $cost, $desc);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>Item ID</th>";
echo "<th>Item Name</th>";
echo "<th>Stock</th>";
echo "<th>CostPrice</th>";
echo "<th>Description</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$item_ID."</td>";
	echo "<td>".$itemname."</td>";
	echo "<td>".$stock."</td>";
	echo "<td>".$cost."</td>";
	echo "<td>".$desc."</td>";
	echo "<td><a href='edit.php?operation=edit&item_ID=".$item_ID."&item_Name=".$itemname."&stock=".$stock."&cost=".$cost."&item_Description=".$desc."'>edit</a></td>";
	echo "<td><a href='retail_Items.php?operation=delete&item_ID=".$item_ID."'>delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";
?>

</body>
</html>