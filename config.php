<?php

session_start();
define("BURL","http://localhost/php%20project/");
define("BURLA","http://localhost/php%20project/admin/");

define("ASSETS","http://localhost/php%20project/assets");
define("BL",__DIR__.'/');  //base link
define("BLA",__DIR__.'/admin/'); //baselink admin


//connect to database

require_once(BL.'function/db.php');