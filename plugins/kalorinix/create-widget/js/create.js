/**
 * Javascript för create-widget.
 *
 * @author Joakim Andersson <joakim@itandersson.se>
 * @copyright Joakim Andersson 2014-05-30
 */
$("#step1").css('background-color', 'cyan');
$("#previousstep").css("visibility", "hidden");
$("#submitToDatabase").css("visibility", "hidden");

/*
 * Metoden bestämmer vilken wizard steg som ska köras genom att kontrollera bakgrundsfärg.
 * http://www.yellowpipe.com/yis/tools/hex-to-rgb/color-converter.php
 */
function step()
{	
    if ($('#step1').css("background-color") == "rgb(0, 255, 255)"){
    	submitForm1();
    }
    if ($('#step2').css("background-color") == "rgb(0, 255, 255)"){
    	submitForm2();
    }
}

/*
 * Funktionen skickar två post variabler till hanteraren. Hanteraren retunerar sedan html data som laddas till sidan.
 */
function submitForm1()
{	
	var createWidget = jsGlobals.createWidget; //Javascript global from ConfigFile.php
	
	var producent = document.getElementById("producent").value;
	var produkt = document.getElementById("produkt").value;
	
	$.post( createWidget + "/handler/ajax/CreateItemHandler.php?Controller=PageTwo",
			{
		        producent:producent,
		        produkt:produkt
		    },
		    function(data,status){
		    	$("#step1").css('background-color', 'transparent');
		    	$("#step2").css('background-color', 'cyan');
		    	$("#nextstep").css("visibility", "hidden");
		    	$("#previousstep").css("visibility", "visible");
		    	$("#submitToDatabase").css("visibility", "visible");
		    	$("#divmatvara").html(data);
		    	});
}

/*
 * Funktionen skickar fyra post variabler till hanteraren. Hanteraren retunerar sedan html data som laddas till sidan.
 */
function submitForm2()
{
	var createWidget = jsGlobals.createWidget; //Javascript global from ConfigFile.php
	
	var kcal = document.getElementById("kcal").value;
	var protein = document.getElementById("protein").value;
	var kolhydrat = document.getElementById("kolhydrat").value;
	var fett = document.getElementById("fett").value;
	
	$.post( createWidget + "/handler/ajax/CreateItemHandler.php?Controller=PageOne",
			{
		        kcal:kcal,
	            protein:protein,
	            kolhydrat:kolhydrat,
	            fett:fett
	         },
	         function(data,status){
	        	 $("#step1").css('background-color', 'cyan');
	        	 $("#step2").css('background-color', 'transparent');
	        	 $("#nextstep").css("visibility", "visible");
	        	 $("#previousstep").css("visibility", "hidden");
	        	 $("#submitToDatabase").css("visibility", "hidden");
	        	 $("#divmatvara").html(data);
	        	 });
}

/*
 * Sparar wizard sida ett och två till databasen. Post variablerna till sida två uppdateras.
 * Hanteraren retunerar sedan html data som laddas till sidan.
 */
function itemTodatabase()
{	
	var createWidget = jsGlobals.createWidget; //Javascript global from ConfigFile.php
	
	var kcal = document.getElementById("kcal").value;
	var protein = document.getElementById("protein").value;
	var kolhydrat = document.getElementById("kolhydrat").value;
	var fett = document.getElementById("fett").value;
	
	$.post( createWidget + "/handler/ajax/InsertItemHandler.php?Controller=Data",
			{
		        kcal:kcal,
	            protein:protein,
	            kolhydrat:kolhydrat,
	            fett:fett
	         },
	         function(data,status){
	        	 $("#step1").css('background-color', 'cyan');
	        	 $("#step2").css('background-color', 'transparent');
	        	 $("#nextstep").css("visibility", "visible");
	        	 $("#previousstep").css("visibility", "hidden");
	        	 $("#submitToDatabase").css("visibility", "hidden");
	        	 $("#divmatvara").html(data);
	        	 });
}

/*
 * Uppdaterar widget
 */
function uppdateWidget3()
{
	var ownWidget = jsGlobals.ownWidget; //Javascript global from ConfigFile.php
	$( "#home_widget_3" ).load( ownWidget + "/handler/ReloadHandler.php?Controller=Own" );
}