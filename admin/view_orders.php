<?php require_once("../config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!-- <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <!-- <link rel="stylesheet" href="../assets/css/card.css"> -->
    
    
</head>
<body>

  <!-- ////////////////////////////////////////////////////////////////////////// -->


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
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            
            
            <tbody>
                <?php $col_arr=['date','order_id','status','room_num','user_name','ext'];
                      $table_arr=['order_info','user_info'];
                      $condition_arr=['user_fk'=>'user_id'];
                      $data = $newconnection->selectMultiTabls($col_arr,$table_arr,$condition_arr);  ?>

                

                <?php foreach($data as $row){   ?>

                  <?php
                            $col_arr1=['name','price','count','img_dir','amount'];
                            $table_arr1=['product','order_product'];
                            $condition_arr1=['order_fk'=>$row['order_id'],'product_id'=>'product_fk'];
                            $product_data=$newconnection->selectMultiTabls($col_arr1,$table_arr1,$condition_arr1);
                            // var_dump($product_data);
                            
                            ?>

                <tr class="text-center x">
                    <td scope="row"><?php echo $row['date'] ?></td>
                    <td class="text-center"> <?php echo $row['user_name'] ?>  </td>
                    <td class="text-center"> <?php echo $row['room_num'] ?>  </td>
                    <td class="text-center"><?php echo $row['ext']?></td>
                    <td class="text-center"><?php echo $row['status']?></td>
                    
                    
                    <td class="text-center">
                    
                    
                        <a href="#" class="btn btn-info delivery" data-field="status" value_id="delivery" data-id="<?php echo $row['order_id']; ?>" data-table="order_info" >Delivery</a>
                        <a href="#" class="btn btn-danger done" data-field="status" value_id="done" data-id="<?php echo $row['order_id']; ?>" data-table="order_info" >Done</a>
                    </td>
                </tr>
                <tr class="expand">
                <td colspan='6' >
                <div >
                <table class="table table-light table-bordered">
                
                <h3 class="text-center">Order Details</h3>
                <thead>
                  <tr class="text-center">
                     
                      <th scope="col text-center">Name</th>
                      <th scope="col text-center">Price</th>
                      <th scope="col text-center">Count</th>
                      <th scope="col text-center">Image</th>
                      <th scope="col text-center">Total</th>
        
                  </tr>
                </thead>
                
                
                <tbody>
                <?php $total=0;
                foreach($product_data as $row1){   ?>
                  <tr class="text-center x">
                    
                    <td class="text-center"> <?php echo $row1['name'] ?>  </td>
                    <td class="text-center"> <?php echo $row1['price']." LE" ?>  </td>
                    <td class="text-center"><?php echo $row1['count']?></td>
                    <td class="text-center"><?php // echo "<img alt='profile pic' src=".BURLA.'users/'.$row['img_dir']." height=50 width=70 style='border-radius: 50%;'/>";?></td>
                    <td class="text-center"><?php echo $row1['amount']." LE"?></td>
                  </tr>
                 
                <?php $total+=$row1['amount']; } ?>
                </tbody>
                </table>
                <h4 class="">Total Price: <?php echo $total." LE"?></h4>
                </div>

                </td>
                  
                
                  
                  
                </tr>

                <?php } ?>
               
            </tbody>
        </table>
        

    </div>


<script  src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script  src="../assets/js/card.js"></script>
<script>
$(document).ready(function() {
$(".delivery").click(function()
{
  
  var item_id = $(this).attr("data-id");
  var table = $(this).attr("data-table");
  var field = $(this).attr("data-field");
  var value =$(this).attr("value_id");
  
  

    $.ajax({
      type:"POST",
      url:"<?php echo BURLA.'inc/update.php'; ?>",
      data:{item_id:item_id,table:table,field:field,value:value},
      dataType:"JSON",
      success:function(data)
      {
       
          // console.log(data.message);
          if(data.message == "success")
          {
            alert("Updated Success");
           

          }
          else 
          {
            alert("Error");
          }
          
      }
    });
    window.location.reload();

    alert("Success");
    
});
$(".done").click(function()
{
  

  var item_id = $(this).attr("data-id");
  var table = $(this).attr("data-table");
  var field = $(this).attr("data-field");
  var value =$(this).attr("value_id");

  console.log(item_id,table,field,value);

    $.ajax({
      type:"POST",
      url:"<?php echo BURLA.'inc/update.php'; ?>",
      data:{item_id:item_id,table:table,field:field,value:value},
      dataType:"JSON",
      success:function(data)
      {
          // console.log(data.message);
          if(data.message == "success")
          {
            alert("Success");
          }
          else 
          {
            alert("Error");
          }
          
      }
    })
    alert("Success");
    window.location.reload();

});

  


});
 

</script>


</body>
</html>