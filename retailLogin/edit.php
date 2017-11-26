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
<body>
<form method="post" action="retail_Items.php" autocomplete="off" />
<div class="container">

<label><b>Item Name:</b></label>
<input type="text" name="itemname" value="<?php echo $_POST['itemname']; ?>" required/>

<label><b>Stock:</b></label>
<input type="text" min="0" name="stock" value="<?php echo $_POST['stock']; ?>" required/>

<label><b>Cost Price:</b></label>
<input type="text" min="0.01" step="0.01" name="cost" value="<?php echo $_POST['cost']; ?>" required/>

<label><b>Item Description:</b></label>
<input type="text" name="desc" value="<?php echo $_POST['desc']; ?>" required/>
</div>
<td align="right">
<input type="hidden" name="item_ID" value="<?php echo $_POST['item_ID']; ?>" />
<input type="hidden" name="update" value="yes" />
<button type="submit" value="update Record"/>Update Item</button>
</td>


</form>
</body>
</html>