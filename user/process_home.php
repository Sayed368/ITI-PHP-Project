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
		create('order_info',['date'=>$_POST['dob'],'user_fk'=>$_SESSION["user_id"],'room'=>$_POST['room'],'note'=>$_POST['note']]);
	    header('Location: home_user.php');
 }
}

?>

