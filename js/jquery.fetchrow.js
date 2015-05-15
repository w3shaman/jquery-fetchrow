/**
 * jQuery Plugin for fetching row from database
 * @requires jQuery 1.4 or later
 *
 * Copyright (c) 2011 Lucky
 * Licensed under the GPL license:
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($) {
	function fetchrow(callBackUrl, textField){
		this.textField = textField;
		this.callBackUrl = callBackUrl;
		this.onPopulated = null;
		this.onNullPopulated = null;
		
		this.textField.attr("autocomplete", "off");
		
		var me=this;
		this.textField.keyup(
			function(e){
				if(e.keyCode == 13){
					$.ajax({
						url : me.callBackUrl + $(this).val(),
						success : function(result){
							try{
								data = $.parseJSON(result);
								if(me.onPopulated != null){
									if(data == null){
										if(me.onNullPopulated != null){
											me.onNullPopulated.call(this, me.textField);
										}
									}
									else{
										me.onPopulated.call(this, data, me.textField);
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
			}
		);
		
		this.preventEnter=function(){
			this.textField.keypress(
				function(e){
					if(e.keyCode==13){
						return false;
					}
					
					return true;
				}
			);
		}
	}
	
	$.fn.fetchrow = function(options) {
		var settings = {
			onPopulated : null,
			onNullPopulated : null
		};
		$.extend(settings, options);
		
		return this.each(function() {
			var obj = new fetchrow(settings.url, $(this));
			
			if($.isFunction(settings.onPopulated) == true){
				obj.onPopulated=settings.onPopulated;
			}
			
			if($.isFunction(settings.onNullPopulated) == true){
				obj.onNullPopulated=settings.onNullPopulated;
			}
			
			obj.preventEnter();
		});
	}
})(jQuery);