/**
 * Javascript.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-10-07
 */

/*
 * 
 */
function btnLoading()
{
	var ownWidget = jsGlobals.ownWidget; //Javascript global from ConfigFile.php
	
	$("#fat-btn").button('loading');
	
	var checkbox = new Array();
	$("input[type='checkbox']").each(function() {
		if(this.checked)
		{ 
			checkbox.push( $(this).val() );
		}
	  });
	
	var jsonString = JSON.stringify(checkbox);
	$.ajax({
        type: "POST",
        url: ownWidget + "/handler/AjaxHandler.php?Controller=Own",
        data: {data : jsonString}, 
        cache: false,

        success: function(data){
        	$("#home_widget_3").html(data);
        }
    });
}
	
	
	