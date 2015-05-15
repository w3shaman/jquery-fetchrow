<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>JQuery FetchRow</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/jquery.fetchrow.js"></script>
</head>
<body>
	<h1>JQuery FetchRow Demo</h1>
	<br/>
	<form action="" method="post">
		<table>
			<tr><td>ID</td><td>:</td><td><input type="text" name="item_id" id="item_id" /> * Type item ID and press Enter.</td></tr>
			<tr><td>Item name</td><td>:</td><td><input type="text" name="item_name" id="item_name" /></td></tr>
			<tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty" id="item_qty" /></td></tr>
		</table>
		<br/>
		<input type="submit" name="submit" id="submit" />
		<script language="javascript" type="text/javascript">
			$("#item_id").fetchrow({
				url : "data.php?id=",
				onPopulated : function(data, textfield){
					$("#item_name").val(data.name);
					$("#item_qty").val(data.qty);
				},
				onNullPopulated : function(textfield){
					alert('Item not found!');
					$("#item_name").val("");
					$("#item_qty").val("");
				}
			});
		</script>
	</form>
</body>
</html>