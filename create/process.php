<?php
require_once '../netting/class.crud.php';
$db = new crud();
//Silmek ucun $_POST-a nezaret
if (isset($_POST['deletedID'])) {
	$id=$_POST['deletedID'];
	$db->delete("jsdiv",'id',$id);
}
//Bazaya elave elemek ucun $_POST-a nezaret
if (isset($_POST['id'])&&isset($_POST['content'])) {
	$div = "<div " . $_POST['content'] . ">" . "</div>";
	$all = array(
		"id" => $_POST['id'],
		"content" => $div
	);
	$db->insert("jsdiv", $all);
}else{
	echo "";
}
