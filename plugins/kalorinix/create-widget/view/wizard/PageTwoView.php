<?php

if(!isset($_SESSION))
{
	session_start();
}

$kcal = "";
$protein = "";
$kolhydrat = "";
$fett = "";

if(isset($_SESSION['kcal'])) {
   $kcal = $_SESSION['kcal'];
} 
if(isset($_SESSION['protein'])) {
   $protein = $_SESSION['protein'];
}
if(isset($_SESSION['kolhydrat'])) {
   $kolhydrat = $_SESSION['kolhydrat'];
} 
if(isset($_SESSION['fett'])) {
   $fett = $_SESSION['fett'];
}
?>

<div class="panel-heading">
   <h3 class="panel-title">Näringsvärde <small>-per 100g</small></h3>
</div>
<div class="panel-body">
      
   <form class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-sm-10">
		<label for="kcal" class="control-label">Kcal:</label>
		<input type="text" class="form-control input-sm" id="kcal" value="<?php echo $kcal; ?>">
    </div>
    <div class="col-sm-10">
		<label for="protein" class="control-label">Protein:</label>
		<input type="text" class="form-control input-sm" id="protein" value="<?php echo $protein; ?>">
    </div>
    <div class="col-sm-10">
		<label for="kolhydrat" class="control-label">Kolhydrat:</label>
		<input type="text" class="form-control input-sm" id="kolhydrat" value="<?php echo $kolhydrat; ?>">
    </div>
    <div class="col-sm-10">
		<label for="fett" class="control-label">Fett:</label>
		<input type="text" class="form-control input-sm" id="fett" value="<?php echo $fett; ?>">
    </div>
  </div>
</form>
   
</div>
