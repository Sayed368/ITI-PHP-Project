<?php
function checkEmpty($value){
    if(empty($value))
    {
        return false;
    }
    else{
        return true;
    }

}

function validEmail($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    
        return false;

    }
    else{
        return true;
    }
}
?>