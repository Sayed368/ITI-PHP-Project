<?php require_once("../config.php"); 

require_once(BLA."inc/header.php");

echo "<img src=".BURLA.'users/'.$user_img_dir." height=300 width=300 />"."<br>";
                           echo $_SESSION['user_name'];
                           echo $_SESSION['user_email'];
                           echo $_SESSION['user_id'];
                           echo $_SESSION['user_img'];

?>


<?php

require_once(BLA."inc/footer.php");
?>


