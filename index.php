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
  <br/>
  <form action="" method="post">
    <p>Using <b>onStart</b> to display loading indicator.</p>
    <table>
      <tr><td>ID</td><td>:</td><td><input type="text" name="item_id5" id="item_id5" /> <img src="images/loader.gif" id="loading5" style="display: none" /></td></tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name5" id="item_name5" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty5" id="item_qty5" /></td></tr>
    </table>
    <br/>
    <input type="submit" name="submit5" id="submit5" />
    <script language="javascript" type="text/javascript">
    $("#item_id5").fetchrow({
      url : "data.php?id=",
      trigger : "blur",
      onRequest: function() {
        $("#loading5").show();
      },
      onComplete: function() {
        $("#loading5").hide();
      },
      onPopulated : function(data, textfield){
        $("#item_name5").val(data.name);
        $("#item_qty5").val(data.qty);
      },
      onNullPopulated : function(textfield){
        $("#item_name5").val("");
        $("#item_qty5").val("");
      }
    });
    </script>
  </form>
  <br/>
  <form action="" method="post">
    <p>Pass additional query string using <b>additionalFields</b> parameter. We can pass more than one additional parameter in key value pair.</p>
    <table>
      <tr>
        <td>Category</td>
        <td>:</td>
        <td>
          <select name="category_id6" id="category_id6">
            <option value="tools">Tools</option>
            <option value="accessories">Accessories</option>
          </select>
        </td>
      </tr>
      <tr><td>ID</td><td>:</td><td><input type="text" name="item_id6" id="item_id6" /></td></tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name6" id="item_name6" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty6" id="item_qty6" /></td></tr>
      <tr><td>Request URL</td><td>:</td><td><div id="request_url6"></div></td></tr>
    </table>
    <br/>
    <input type="submit" name="submit6" id="submit6" />
    <script language="javascript" type="text/javascript">
    $("#item_id6").fetchrow({
      url : "data.php?id=",
      trigger : "blur",
      onPopulated : function(data, textfield){
        $("#item_name6").val(data.name);
        $("#item_qty6").val(data.qty);
        $("#request_url6").html(data.request_url);
      },
      onNullPopulated : function(textfield){
        $("#item_name6").val("");
        $("#item_qty6").val("");
        $("#request_url6").html("");
      },
      additionalFields : {
        "&category_id=" : $("#category_id6")
      }
    });
    </script>
  </form>
  <p>&nbsp;</p>
  <fieldset>
    <p>More than one element with the same class name.</p>
    <form action="" method="post">
      <table>
        <tr><td>ID</td><td>:</td><td><input type="text" name="id1" class="id" /></td></tr>
        <tr><td>Item name</td><td>:</td><td><input type="text" name="name1" class="name" /></td></tr>
        <tr><td>Qty</td><td>:</td><td><input type="text" name="qty1" class="qty" /></td></tr>
      </table>
      <br/>
      <input type="submit" />
    </form>
    <p>&nbsp;</p>
    <form action="" method="post">
      <table>
        <tr><td>ID</td><td>:</td><td><input type="text" name="id2" class="id" /></td></tr>
        <tr><td>Item name</td><td>:</td><td><input type="text" name="name2" class="name" /></td></tr>
        <tr><td>Qty</td><td>:</td><td><input type="text" name="qty2" class="qty" /></td></tr>
      </table>
      <br/>
      <input type="submit" />
    </form>
  </fieldset>
  <script language="javascript" type="text/javascript">
  $(".id").fetchrow({
    url : "data.php?id=",
    trigger : "blur",
    onPopulated : function(data, textfield){
      var index = $(".id").index(textfield);
      $(".name").get(index).value = data.name;
      $(".qty").get(index).value = data.qty;
    },
    onNullPopulated : function(textfield){
      var index = $(".id").index(textfield);
      $(".name").get(index).value = "";
      $(".qty").get(index).value = "";
    },
  });
  </script>
  <p>&nbsp;</p>
  <p>Custom error callback.</p>
  <form action="" method="post">
    <table>
      <tr><td>ID</td><td>:</td><td><input type="text" name="id3" /></td></tr>
      <tr><td>Item name</td><td>:</td><td><input type="text" name="name3" /></td></tr>
      <tr><td>Qty</td><td>:</td><td><input type="text" name="qty3" /></td></tr>
    </table>
    <br/>
    <input type="submit" />
  </form>
  <script language="javascript" type="text/javascript">
  $("input[name=id3]").fetchrow({
    url : "data2.php?id=", // Wrong URL to raise the error.
    trigger : "blur",
    onPopulated : function(data, textfield){
      $("input[name=name3]").val(data.name);
      $("input[name=qty3]").val(data.qty);
    },
    onNullPopulated : function(textfield){
      $("input[name=name3]").val("");
      $("input[name=name3]").val("");
    },
    onError : function () { // Custom error callback.
      alert("ERROR!");
    }
  });
  </script>
</body>
</html>
