<html>
<head>
<style type="text/css">@import "styles.css";
body {font-family: Arial;}
input[type=text]{
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
	button { 
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 50%;
		position:absolute;
		left: 25%;
	}
.container {
		padding: 50px;
		width:550px;
		margin: auto;
	}
	</style>
</head>
<form method="post" action="retail_Items.php">
<div class="container">

<label><b>Item Name:</b></label>
<input type="text" name="itemname" value="<?php echo $_GET['item_Name']; ?>" required/>

<label><b>Stock:</b></label>
<input type="text" name="stock" value="<?php echo $_GET['stock']; ?>" required/>

<label><b>Cost Price:</b></label>
<input type="text" name="cost" value="<?php echo $_GET['cost']; ?>" required/>

<label><b>Item Description:</b></label>
<input type="text" name="desc" value="<?php echo $_GET['item_Description']; ?>" required/>
</div>
<td align="right">
<input type="hidden" name="item_ID" value="<?php echo $_GET['item_ID'] ?>" />
<input type="hidden" name="update" value="yes" />
<button type="submit" value="update Record"/>Update Item</button>
</td>


</form>
</html>