<?php

require_once("../function/helpers.php");
if (is_post()) {
	$rules=[
             
             'room'=>'required',
             'note'=>'required'
	];
	$eroor=validator_errors($rules);
	if ($eroor) {
		echo 'error '.print_r($eroor);
	}
	else{
		create('order_info',['user_fk'=>$_POST["user"],'room'=>$_POST['room'],'note'=>$_POST['note']]);
		create('order_product',['order_fk'=>$_POST['ordId'],'product_fk'=>$_POST["prodId"]]);
	    echo "The order is sent sucussfuly";
 }
}

?>

