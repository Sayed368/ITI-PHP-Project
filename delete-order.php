<?php

        $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");
                 echo $_GET["delete"] ;
        if(isset($_GET["delete"])){

            $order_delete= $_GET["delete"] ;

            $query=mysqli_query($conn,"Delete from order_info where order_id= '$order_delete' ") ;

            header('Location:./newDP.php') ;
        }

?>


