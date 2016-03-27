<!DOCTYPE html>
<html>
<head>
  <title>JQuery FetchRow</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/jquery.fetchrow.js"></script>
</head>
<body>
  <h1>JQuery FetchRow Demo</h1>
  <br/>
  <form action="" method="post">
    <p>Fetch row when <b>Enter</b> is pressed.</p>
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
  <br/>
  <form action="" method="post">
    <p>Fetch row when <b>Lost focus</b>.</p>
    <table>
      <tr><td>ID</td><td>:</td><td><input type="text" name="item_id2" id="item_id2" /></td></tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name2" id="item_name2" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty2" id="item_qty2" /></td></tr>
    </table>
    <br/>
    <input type="submit" name="submit2" id="submit2" />
    <script language="javascript" type="text/javascript">
    $("#item_id2").fetchrow({
      url : "data.php?id=",
      trigger : "blur",
      onPopulated : function(data, textfield){
        $("#item_name2").val(data.name);
        $("#item_qty2").val(data.qty);
      },
      onNullPopulated : function(textfield){
        alert('Item not found!');
        $("#item_name2").val("");
        $("#item_qty2").val("");
      }
    });
    </script>
  </form>
  <br/>
  <form action="" method="post">
    <p>Fetch row when <b>On item change</b>.</p>
    <table>
      <tr>
        <td>ID</td><td>:</td>
        <td>
          <select name="item_id3" id="item_id3">
            <option value="">-</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </td>
      </tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name3" id="item_name3" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty3" id="item_qty3" /></td></tr>
    </table>
    <br/>
    <input type="submit" name="submit3" id="submit3" />
    <script language="javascript" type="text/javascript">
    $("#item_id3").fetchrow({
      url : "data.php?id=",
      trigger : "change",
      onPopulated : function(data, textfield){
        $("#item_name3").val(data.name);
        $("#item_qty3").val(data.qty);
      },
      onNullPopulated : function(textfield){
        $("#item_name3").val("");
        $("#item_qty3").val("");
      }
    });
    </script>
  </form>
  <br/>
  <form action="" method="post">
    <p>Fetch row when <b>On button click</b>.</p>
    <table>
      <tr><td>ID</td><td>:</td><td><input type="text" name="item_id4" id="item_id4" /> <input type="button" value="Search" id="button4" /></td></tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name4" id="item_name4" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty4" id="item_qty4" /></td></tr>
    </table>
    <br/>
    <input type="submit" name="submit4" id="submit4" />
    <script language="javascript" type="text/javascript">
    // Use the button ID instead of the textfield ID.
    $("#button4").fetchrow({
      url : "data.php?id=",
      trigger : "click",
      onPopulated : function(data, textfield){
        $("#item_name4").val(data.name);
        $("#item_qty4").val(data.qty);
      },
      onNullPopulated : function(textfield){
        $("#item_name4").val("");
        $("#item_qty4").val("");
      },
      keyfield : $("#item_id4") // Pass the textfield as key field.
    });
    </script>
  </form>
  <p>&nbsp;</p>
</body>
</html>
