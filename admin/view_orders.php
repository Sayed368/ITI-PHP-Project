<?php require_once("../config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link href="../assets/css/style.css" rel="stylesheet">
<link href="../assets/css/card.css" rel="stylesheet">
</head>
<body>
<?php 
      


?>



    <div class="col-sm-12 pt-5">
        <h3 class="text-center p-3 bg-primary text-white">View All Orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room</th>
                    <th scope="col">Ext</th>
                    <th scope="col">Status</th>
       
                </tr>
            </thead>
            
            
            <tbody>
                <?php $col_arr=['date','order_id','status','room_num','user_name','ext'];
                      $table_arr=['order_info','user_info'];
                      $condition_arr=['user_fk'=>'user_id'];
                      $data = $newconnection->selectMultiTabls($col_arr,$table_arr,$condition_arr);  ?>

                

                <?php foreach($data as $row){   ?>

                  <?php
                            $col_arr1=['name','price','count','amount'];
                            $table_arr1=['product','order_product'];
                            $condition_arr1=['order_fk'=>$row['order_id'],'product_id'=>'product_fk'];
                            $product_data=$newconnection->selectMultiTabls($col_arr1,$table_arr1,$condition_arr1);
                            var_dump($product_data);
                            
                            ?>

                <tr class="text-center x">
                    <td scope="row"><?php echo $row['date'] ?></td>
                    <td class="text-left"> <?php echo $row['user_name'] ?>  </td>
                    <td class="text-left"> <?php echo $row['room_num'] ?>  </td>
                    <td class="text-center"><?php echo $row['ext']?></td>
                    <td class="text-center"><?php echo $row['status']?></td>
                    
                    
                    <!-- <td class="text-center">
                    
                    
                        <a href="<?php// echo BUA.'cities/edit.php?id='.$row['city_id']; ?>" class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-field="city_id" data-id="<?php //echo $row['city_id']; ?>" data-table="cities" >Delete</a>
                    </td> -->
                </tr>
                <tr>
                <td colspan='5' class="">
                <div>
                <table class="table table-light table-bordered ">
                
                <h3 class="text-center">Order Details</h3>
                <thead>
                  <tr class="text-center">
                     
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Count</th>
                      <th scope="col">Amount</th>
        
                  </tr>
                </thead>
                
                
                <tbody>
                <?php $total=0;
                foreach($product_data as $row1){   ?>
                  <tr class="text-center x">
                    
                    <td class="text-left"> <?php echo $row1['name'] ?>  </td>
                    <td class="text-left"> <?php echo $row1['price'] ?>  </td>
                    <td class="text-center"><?php echo $row1['count']?></td>
                    <td class="text-center"><?php echo $row1['amount']?></td>
                  </tr>
                 
                <?php $total+=$row1['amount']; } ?>
                </tbody>
                </table>
                <h4 class="">Total Price: <?php echo $total?></h4>
                </div>

                </td>
                  
                
                  
                  
                </tr>

                <?php } ?>
               
            </tbody>
        </table>
        

        <script>
          $('a').hover(function(){         
            var $ind = $(this).index();   
            console.log('$ind');  
        },function(){console.log('$ind');}); 
        </script>
    </div>
    <!-- <div class="container">
     
            
    <div class="card">
              <div class="header">
               <h4>Shopping Bag total :
                 <span id="tot">
                 0
                 </span>$</h4>
              </div>
              
                <div class="product">
                <div>
                  <div class="op">
                  <span class="remove">X</span>
                  <i  class="fas fa-heart"></i>
                    </div>
                </div>
                <div>
                  
                  <img width="120"height="100" class="img" src="https://dsw.scene7.com/is/image/DSWShoes/377442_001_ss_01?$pdp-image$" alt="">
                </div>
                <div class="disc">
                  <div class="name">sbadri 3</div>
                  <div class="color">black</div>
                  
                </div>
                <div class="quant">
                  <span class="plus">+</span>
                  <span class="qt">1</span>
                  <span class="minus">-</span>
                </div>
                <div>
                  <h4 class="price">
                    60$
                  </h4>
                  <h4 class="pu" >60</h4>
                  
                </div>
                
              </div>
            </div>


                  </td>
                  
            
           
    </div> -->

    <script src="../assets/js/jquery.js" ></script>

<script src="../assets/js/bootstrap.bundle.min.js" ></script>

<script src="../assets/js/card.js" ></script>

    
</body>
</html>