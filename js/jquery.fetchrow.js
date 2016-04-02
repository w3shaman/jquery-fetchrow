/**
 * jQuery Plugin for fetching row from database
 * @version 1.2
 * @requires jQuery 1.4 or later
 *
 * Copyright (c) 2016 Lucky
 * Licensed under the GPL license:
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($) {
  function fetchrow(settings, element){
    var me=this;
    var keyfield = settings.keyfield;

    this.preventEnter=function(){
      element.keypress(
        function(e){
          if(e.keyCode==13){
            return false;
          }

          return true;
        }
      );
    }

    this.doRequest = function() {
      $.ajax({
        url : settings.url + keyfield.val(),
        success : function(result){
          try{
            var data = null;

            if (typeof result == 'string')
              data = $.parseJSON(result);
            else if (typeof result == 'object')
              data = result;

            if(typeof settings.onPopulated === "function"){
              if(data == null){
                if(typeof settings.onNullPopulated === "function"){
                  settings.onNullPopulated.call(this, element);
                }
              }
              else{
                settings.onPopulated.call(this, data, element);
              }
            }
          }
          catch(e){
            alert('Sorry, an error has occured!');
          }
        },
        error : function(xhr, status, ex){
          alert('Sorry, an error has occured!');
        }
      });
    }

    var arr = settings.trigger.split("|");
    switch(arr[0]) {
      case "keypress" :
        element.keyup(
          function(e){
            if(e.keyCode == arr[1]){
              me.doRequest();
            }
          }
        );

        element.attr("autocomplete", "off");

        this.preventEnter();

        break;
      case "blur":
        element.blur(
          function(e){
            me.doRequest();
          }
        );

        break;
      case "change":
        element.change(
          function(e){
            me.doRequest();
          }
        );

        break;
      case "click":
        element.click(
          function(e){
            me.doRequest();
          }
        );

        break;
    }
  }

  $.fn.fetchrow = function(options) {
    var settings = {
      onPopulated : null,
      onNullPopulated : null,
      trigger : 'keypress|13', // Supported events are: keypress|<keycode>, change, blur, click.
                               // Click event require you to specify the keyfield element.
      keyfield : $(this)
    };
    $.extend(settings, options);

    return this.each(function() {
      var obj = new fetchrow(settings, $(this));
    });
  }
})(jQuery);
