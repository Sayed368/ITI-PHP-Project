<?php

require_once("../function/helpers.php");
if (is_post()) {
	$rules=[
            //  'first_name'=>'required|string|min:3|max:30',
            //  'last_name'=>'required|string|min:3|max:30',
            //  'email'=>'required|string|min:3|max:30|unique:users,email|email',
            //  'passward'=>'required|string|min:3|max:30',
            //  'role'=>'required'	,
            //  'address'=>'required|string|min:10|max:50',
            //  'phone'=>'required|int|',
            //  'gender'=>'required',
            //  'dob'=>'required|string',
            //  'biography'=>'required|string|min:20|max:500'
	];
	$eroor=validator_errors($rules);
	if ($eroor) {
		echo 'error '.print_r($eroor);
	}
	else{
		create('order_info',['date'=>$_POST['dob'],'user_fk'=>11,'room'=>$_POST['room'],'note'=>$_POST['note']]);
	//    var_dump($_POST);
	//    foreach ($_POST as $key => $value) {
	// 	   echo $value;
 }
}

?>

