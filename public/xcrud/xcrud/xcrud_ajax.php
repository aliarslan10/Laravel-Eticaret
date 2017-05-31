<?php 

include ('xcrud.php');
header('Content-Type: text/html; charset=' . Xcrud_config::$mbencoding);
echo Xcrud::get_requested_instance();

?>

<style type="text/css">
	.xcrud-overlay {
	     display: none !important;	
	 }
</style>