<!DOCTYPE html>
<html>
<head>
  <title>JQuery FetchRow</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Get one row from database using jQuery and display the fields in form elements." />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../js/jquery.fetchrow.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
  <h1>JQuery FetchRow Demo</h1>
  <div class="row">
    <div class="example">
      <div class="title">Fetch Row on Enter</div>
      <div>
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
              $("#item_name").val("");
              $("#item_qty").val("");
              alert('Item not found!');
              $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
            }
          });
          </script>
          <p>The code:</p>
<pre>
$("#item_id").fetchrow({
  url : "data.php?id=",
  onPopulated : function(data, textfield){
    $("#item_name").val(data.name);
    $("#item_qty").val(data.qty);
  },
  onNullPopulated : function(textfield){
    $("#item_name").val("");
    $("#item_qty").val("");
    alert('Item not found!');
    $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
  }
});
</pre>
        </form>
      </div>
    </div>
    <div class="example">
      <div class="title">Fetch Row on Lost Focus</div>
      <div>
        <form action="" method="post">
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
              $("#item_name2").val("");
              $("#item_qty2").val("");

              // Only show alert if the ID field is not empty.
              if (textfield.val() !== "") {
                alert('Item not found!');
              }

              $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
            }
          });
          </script>
          <p>The code:</p>
<pre>
$("#item_id2").fetchrow({
  url : "data.php?id=",
  trigger : "blur",
  onPopulated : function(data, textfield){
    $("#item_name2").val(data.name);
    $("#item_qty2").val(data.qty);
  },
  onNullPopulated : function(textfield){
    $("#item_name2").val("");
    $("#item_qty2").val("");

    // Only show alert if the ID field is not empty.
    if (textfield.val() !== "") {
      alert('Item not found!');
    }

    $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
  }
});
</pre>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="example">
      <div class="title">Fetch Row on Change</div>
      <div>
        <form action="" method="post">
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
          <p>The code:</p>
<pre>
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
</pre>
        </form>
      </div>
    </div>
    <div class="example">
      <div class="title">Fetch Row on Button Click</div>
      <div>
        <form action="" method="post">
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
          <p>The code:</p>
<pre>
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
</pre>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="example">
      <div class="title">Loading Indicator</div>
      <div>
        <form action="" method="post">
          <p>Using <b>onRequest</b> to display loading indicator then hide it using <b>onComplete</b> callback after the request is done.</p>
          <table>
            <tr><td>ID</td><td>:</td><td><input type="text" name="item_id5" id="item_id5" /> <img src="images/loader.gif" id="loading5" style="display:none" /> <br/><i>Type item ID and press Enter.</i></td></tr>
            <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name5" id="item_name5" /></td></tr>
            <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty5" id="item_qty5" /></td></tr>
          </table>
          <br/>
          <input type="submit" name="submit5" id="submit5" />
          <script language="javascript" type="text/javascript">
          $("#item_id5").fetchrow({
            url : "data.php?id=",
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
          <p>The code:</p>
<pre>
$("#item_id5").fetchrow({
  url : "data.php?id=",
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
</pre>
        </form>
      </div>
    </div>
    <div class="example">
      <div class="title">Additional Query String</div>
      <div>
        <form action="" method="post">
          <p>Pass additional query string using <b>additionalFields</b> parameter. We can pass more than one additional parameter in key value pair. In this example we will send the category value along with the query string.</p>
          <table>
            <tr>
              <td>Category</td>
              <td>:</td>
              <td>
                <select name="category6" id="category6">
                  <option value="tools">Tools</option>
                  <option value="electronics">Electronics</option>
                  <option value="furniture">Furniture</option>
                </select>
              </td>
            </tr>
            <tr><td>ID</td><td>:</td><td><input type="text" name="item_id6" id="item_id6" /><br/><i>Type item ID and press Enter.<br/>Make sure you have chosen the correct category.</i></td></tr>
            <tr><td>Item name</td><td>:</td><td><input type="text" name="item_name6" id="item_name6" /></td></tr>
            <tr><td>Qty</td><td>:</td><td><input type="text" name="item_qty6" id="item_qty6" /></td></tr>
            <tr><td>Parameter</td><td>:</td><td id="request_url6" style="font-weight:bold"></td></tr>
          </table>
          <br/>
          <input type="submit" name="submit6" id="submit6" />
          <script language="javascript" type="text/javascript">
          $("#item_id6").fetchrow({
            url : "data.php?id=",
            onPopulated : function(data, textfield){
              $("#item_name6").val(data.name);
              $("#item_qty6").val(data.qty);
              $("#request_url6").html(data.request_param);
            },
            onNullPopulated : function(textfield){
              $("#item_name6").val("");
              $("#item_qty6").val("");
              $("#request_url6").val("");
              alert("Please choose a correct category!");
              $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
            },
            additionalFields : {
              "&category=" : $("#category6")
            }
          });
          </script>
          <p>The code:</p>
<pre>
$("#item_id6").fetchrow({
  url : "data.php?id=",
  onPopulated : function(data, textfield){
    $("#item_name6").val(data.name);
    $("#item_qty6").val(data.qty);
    $("#request_url6").html(data.request_param);
  },
  onNullPopulated : function(textfield){
    $("#item_name6").val("");
    $("#item_qty6").val("");
    $("#request_url6").val("");
    alert("Please choose a correct category!");
    $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
  },
  additionalFields : {
    "&amp;category=" : $("#category6")
  }
});
</pre>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="example">
      <div class="title">Custom Error Message</div>
      <div>
        <p>Custom error message using callback function (we intentionally point to wrong URL to raise error).</p>
        <form action="" method="post">
          <table>
            <tr><td>ID</td><td>:</td><td><input type="text" name="id7" /> * Type item ID and press Enter.</td></tr>
            <tr><td>Item name</td><td>:</td><td><input type="text" name="name7" /></td></tr>
            <tr><td>Qty</td><td>:</td><td><input type="text" name="qty7" /></td></tr>
          </table>
          <br/>
          <input type="submit" />
          <script language="javascript" type="text/javascript">
          $("input[name=id7]").fetchrow({
            url : "data2.php?id=", // Wrong URL to raise the error.
            onPopulated : function(data, textfield){
              $("input[name=name7]").val(data.name);
              $("input[name=qty7]").val(data.qty);
            },
            onNullPopulated : function(textfield){
              $("input[name=name7]").val("");
              $("input[name=name7]").val("");
            },
            onError : function () { // Custom error callback.
              alert("ERROR: Sorry there is an unexpected error, please try again later.");
              $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
            }
          });
          </script>
          <p>The code:</p>
<pre>
$("input[name=id7]").fetchrow({
  url : "data2.php?id=", // Wrong URL to raise the error.
  onPopulated : function(data, textfield){
    $("input[name=name7]").val(data.name);
    $("input[name=qty7]").val(data.qty);
  },
  onNullPopulated : function(textfield){
    $("input[name=name7]").val("");
    $("input[name=name7]").val("");
  },
  onError : function () { // Custom error callback.
    alert("ERROR: Sorry there is an unexpected error, please try again later.");
    $(':focus').blur(); // Unfocus on the element so we wont get alert message repeatedly when pressing Enter to close it.
  }
});
</pre>
        </form>
      </div>
    </div>
    <div class="example">
      <div class="title">Multiple Events</div>
      <div>
        <p>Use multiple events as trigger. Fetch row action will be executed on <b>button click</b> or when <b>enter</b> key is pressed.</p>
        <form action="" method="post">
          <table>
            <tr><td>ID</td><td>:</td><td><input type="text" name="id8" /> <input type="button" value="Search" id="button8" /></td></tr>
            <tr><td>Item name</td><td>:</td><td><input type="text" name="name8" /></td></tr>
            <tr><td>Qty</td><td>:</td><td><input type="text" name="qty8" /></td></tr>
          </table>
          <br/>
          <input type="submit" />
          <script language="javascript" type="text/javascript">
          $("input[name=id8]").fetchrow({
            url : "data.php?id=", // Wrong URL to raise the error.
            trigger : "click,keypress|13", // Use comma (,) to separate each event.
            onPopulated : function(data, textfield){
              $("input[name=name8]").val(data.name);
              $("input[name=qty8]").val(data.qty);
            },
            onNullPopulated : function(textfield){
              $("input[name=name8]").val("");
              $("input[name=name8]").val("");
            },
            button : $("#button8") // The button as the source of click event.
          });
          </script>
          <p>The code:</p>
<pre>
$("input[name=id8]").fetchrow({
  url : "data.php?id=", // Wrong URL to raise the error.
  trigger : "click,keypress|13", // Use comma (,) to separate each event.
  onPopulated : function(data, textfield){
    $("input[name=name8]").val(data.name);
    $("input[name=qty8]").val(data.qty);
  },
  onNullPopulated : function(textfield){
    $("input[name=name8]").val("");
    $("input[name=name8]").val("");
  },
  button : $("#button8") // The button as the source of click event.
});
</pre>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
