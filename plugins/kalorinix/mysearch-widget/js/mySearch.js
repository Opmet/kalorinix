/**
 * Javascript.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-06-18
 */
$("#search_step1").css('background-color', 'cyan');
$("#search_previousstep").css("visibility", "hidden");
$("#search_create").css("visibility", "hidden");

/*
 * Metoden bestämmer vilken wizard steg som ska köras genom att kontrollera bakgrundsfärg.
 * http://www.yellowpipe.com/yis/tools/hex-to-rgb/color-converter.php
 */
function search_step()
{
    if ($('#search_step1').css("background-color") == "rgb(0, 255, 255)"){
        search_step2();
    }
    if ($('#search_step2').css("background-color") == "rgb(0, 255, 255)"){
        search_step1();
    }
}

function search_step1()
{
	var mysearchWidget = jsGlobals.mysearchWidget; //Javascript global from ConfigFile.php
	
	$("#search_divmatvara").load( mysearchWidget + "/ajax/search_wizard_step1.htm", function() {
		$("#search_step1").css('background-color', 'cyan');
		$("#search_step2").css('background-color', 'transparent');
		$("#search_nextstep").css("visibility", "visible");
		$("#search_previousstep").css("visibility", "hidden");
		$("#search_create").css("visibility", "hidden");
		});
}

function search_step2()
{
	var mysearchWidget = jsGlobals.mysearchWidget; //Javascript global from ConfigFile.php
	
	$("#search_divmatvara").load( mysearchWidget + "/ajax/search_wizard_step2.htm", function() {
		$("#search_step1").css('background-color', 'transparent');
		$("#search_step2").css('background-color', 'cyan');
		$("#search_nextstep").css("visibility", "hidden");
		$("#search_previousstep").css("visibility", "visible");
		$("#search_create").css("visibility", "visible");
		});
}

/*
 * TODO: php AJAX
 */
function showItems(text)
{
	var mysearchWidget = jsGlobals.mysearchWidget; //Javascript global from ConfigFile.php
	var postValue = document.getElementById("search").value;
	
	$.post( mysearchWidget + "/handler/SearchItemHandler.php?Controller=Search",
			{
		        search:postValue,
		    },
		    function(data,status){
		    	var obj = JSON.parse(data);
		    	
		    	for (i = 0; i < obj.length; i++) {
		    		jQuery.each( obj[i], function( j, val ) {
		    			$('#replybox').append(val + " \n")
		    		});
		    		
		    	}
		    });
}