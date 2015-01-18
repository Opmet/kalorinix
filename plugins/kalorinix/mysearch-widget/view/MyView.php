<?php
define('__WIZARDSTEPONE__', dirname(dirname(__FILE__)));
?>
<div class="widget-wrapper">
 <h3 class="widget-title-home">Allas matvaror</h3>
 
 <ul class="wizard-pagination">
  <li id="search_scroll1" class="wizard-inline"><a href="#">&laquo;</a></li>
  <li id="search_step1" class="wizard-inline">Sök</li>
  <li id="search_step2" class="wizard-inline">Mängd</li>
  <li id="search_step2" class="wizard-inline">Näringsvärde</li>
  <li id="search_scroll2" class="wizard-inline"><a href="#">&raquo;</a></li>
</ul>
 
 <br />
 
 <div class="panel panel-default" id="search_divmatvara">
  <?php require_once(__WIZARDSTEPONE__.'/ajax/search_wizard_step1.htm'); ?>
</div>
 
<ul class="wizard-pagination">
  <li class="wizard-inline"><button type="button" id="search_previousstep" class="btn btn-default btn-sm" onclick="search_step()">&laquo; Föregående</button></li>
  <li class="wizard-inline"><button type="button" id="search_nextstep" class="btn btn-default btn-sm" onclick="search_step()">Nästa steg &raquo;</button></li>
  <li class="wizard-inline"><button type="button" id="search_create" class="btn wizard-margin-top" onclick="">Skapa</button></li>
</ul>
</div>