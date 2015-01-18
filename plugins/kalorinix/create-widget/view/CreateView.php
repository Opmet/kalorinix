<?php
define('__WIZARDPAGEONEcreateview__', dirname(dirname(__FILE__)));
?>
<div class="widget-wrapper">
<h3 class="widget-title-home">Skapa ny matvara</h3>

<ul class="wizard-pagination">
<li id="scroll1" class="wizard-inline"><a href="#">&laquo;</a></li>
<li id="step1" class="wizard-inline">Matvara</li>
<li id="step2" class="wizard-inline">Näringsvärde</li>
<li id="scroll2" class="wizard-inline"><a href="#">&raquo;</a></li>
</ul>

<br />

<div class="panel panel-default" id="divmatvara">
  <?php
     require_once(__WIZARDPAGEONEcreateview__.'/controller/wizard/PageOneController.php'); 
     $wizard = new PageOneController();
     $wizard->requirePage();
  ?>
</div>
 
<ul class="wizard-pagination">
  <li class="wizard-inline"><button type="button" id="previousstep" class="btn btn-default btn-sm" onclick="step()">&laquo; Föregående</button></li>
  <li class="wizard-inline"><button type="button" id="nextstep" class="btn btn-default btn-sm" onclick="step()">Nästa steg &raquo;</button></li>
  <li class="wizard-margin-top"><button type="button" id="submitToDatabase" class="btn btn-primary pull-right" onclick="itemTodatabase(); uppdateWidget3();">Spara till mina matvaror</button></li>
</ul>

</div>