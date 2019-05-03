<?
$page = $_GET['page']; 

if ($page == "choose") { 
	include_once "choose.php"; 
} elseif($page == "truewallet") { 
	include_once "truewallet.php"; 
} elseif($page == "truemoney") { 
	include_once "truemoney.php"; 
} else { 
	include_once "choose.php"; 
} 
?>
