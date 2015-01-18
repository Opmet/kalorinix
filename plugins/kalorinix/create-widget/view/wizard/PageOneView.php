<?php

if(!isset($_SESSION))
{
	session_start();
}

$producent = "";
$produkt = "";

if(isset($_SESSION['producent'])) {
   $producent = $_SESSION['producent'];
} 
if(isset($_SESSION['produkt'])) {
   $produkt = $_SESSION['produkt'];
}
?>

<div class="panel-heading">
	<h3 class="panel-title">Matvara</h3>
</div>
<div class="panel-body">
	<form id="form1" action="" method="post" class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-10">
				<label for="producent" class="control-label">Märke/Producent:</label>
				<input type="text" class="form-control input-sm" id="producent" value="<?php echo $producent; ?>">
			</div>
			<div class="col-sm-10">
				<label for="produkt" class="control-label">Produkt:</label>
				<input type="text" class="form-control input-sm" id="produkt" value="<?php echo $produkt; ?>">
			</div>
		</div>
	</form>
</div>