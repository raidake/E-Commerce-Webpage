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


if(isset($_POST['operation'])){
	if($_POST['operation']=="delete")
	{
		$query=$connect->prepare("delete from retail_items where item_ID=".$_POST['item_ID']);
		if($query->execute())
		{
			echo "<center>Record Deleted!</center><br>";
		}
	}
}
?>

<?php include("Header.php");?>
<html>
<head>
<style type="text/css">@import "styles.css";
	body {font-family: Arial;}
	.button { 
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 50%;
	}
	.button1 { 
		background-color: #f44336;
	}
	input[type=text], input[type=number]{
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 2px solid #ccc;
		box-sizing: border-box;
	}	
	input:focus { 
		outline:none;
		border-color:#9ecaed;
		box-shadow:0 0 10px #9ecaed;
	}
	.container {
		padding: 50px;
		width:550px;
		margin: auto;
	}
	table {
		border-collapse: collapse;
		width: 75%;
	}
	th, td {
		padding: 1px;
		text-align: center;
		border-bottom: 1px solid #ddd;
	}
	tr:hover {background-color:#f5f5f5;}

</style>
</head>
<body>
	</style>
</head>
<body>
	

	<form method="post" action="retail_Items.php" autocomplete="off" />
		<div class="container">
		<label><b>Item Name:</b></label>
		<input type="text" placeholder="Enter Item Name" name="itemname" required>
		
		<label><b>Stock:</b></label>
		<input type="number" min="0" placeholder="Enter No. of Stock" name="stock" required/>
		
		<label><b>Item Cost:</b></label>
		<input type="number" min="0.01" step="0.01" placeholder="Enter Cost of Each Item" name="cost" required/>
		
		<label><b>Item Description:</b></label>
		<input type="text" placeholder="Enter Item Description" name="desc" />
		
		<input type="hidden" value="01" name="retails_ID">
		
		<input type="hidden" name="insert" value="yes" />
		<button type="submit" value="Add Item"/>Add Item</button>
		</div>
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
	echo "<td> $".$cost."</td>";
	echo "<td>".$desc."</td>";
	echo '<td>
			<form method="post" action="edit.php">
				<input type="hidden" name="item_ID" value="'.$item_ID.'" />
				<input type="hidden" name="itemname" value="'.$itemname.'" />
				<input type="hidden" name="stock" value="'.$stock.'" />
				<input type="hidden" name="cost" value="'.$cost.'" />
				<input type="hidden" name="desc" value="'.$desc.'" />
				<button class="button" type ="submit">Edit</button>
			</form>
		</td>';
	
	echo '<td>
			<form method="post" action="retail_Items.php">
				<input type="hidden" name="operation" value="delete">
				<input type="hidden" name="item_ID" value="'.$item_ID.'" />
				<button class="button button1" type ="submit" name="delete">Delete</button>
			</form>
		</td>';
	echo "</tr>";	
	
}
echo "</table>";
?>

</body>
</html>