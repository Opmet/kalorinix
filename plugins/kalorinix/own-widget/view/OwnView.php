<?php
define('__OWNCONTROLLER__', dirname(dirname(__FILE__)));
?>
<div class="widget-wrapper">
 <h3 class="widget-title-home">Mina matvaror</h3>
 
 <br />
 <br />

 <div id="container">
 <?php
    require_once(__OWNCONTROLLER__.'/controller/OwnController.php'); 
    $result = new OwnController();
    foreach ($result->execute() as $item) { $value = $item['produkt'];
 ?>
    <input type="checkbox" value="<?php echo $value; ?>"> <?php echo $value; ?><br>
 <?php
     }
 ?>
 </div>
 
 <div id="container">
    <button id="fat-btn" class="btn btn-primary" data-loading-text="Tar bort..." onclick="btnLoading()"
      type="button"> Ta bort
    </button>
 </div>
</div>