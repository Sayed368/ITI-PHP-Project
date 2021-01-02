<?php
             $totalprice=0 ; 
       
           $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");

           if(isset($_GET["id"])){

            $order_id= $_GET["id"] ;

            $query=mysqli_query($conn,"Select name,price,img_name,count from product,order_product where order_fk = $order_id and product_fk = product_id ") ;
             

            echo "<div class='row justify-content-between'>";

    while($row = mysqli_fetch_array($query)){
            $totalprice +=$row['price']*$row['count'] ;
        echo 
        "<div class='col-6 col-sm-4 col-md-3  align-items-end justify-content-center ' >
            <div class='card  text-center' style='width: 70%; height: 100%'>
            <img class='card-img-top' height='50px' src='assets/imgs/".$row['img_name']."' alt='Card image cap'>
            <div class='card-body'>
                <h3><span class='badge badge-pill badge-light'>".$row['name']."</span></h3>
                <h4><span class='badge badge-pill badge-light'>".$row['price']*$row['count']."</span></h4>
            </div>
            </div>
            <span class='label'><span>".$row['price']." EGP</span></span>
        </div>";

        
    } 

    echo "</div>";
    echo "<br>" ;
    echo   "  <h1>totalprice=" .$totalprice ." </h1> " ;

           }

?>