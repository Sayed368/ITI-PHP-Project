<?php require_once("../../function/db.php");  

// require_once(BLA."inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

    <title>checks</title>
    <script src="../../assets/js/jquery.js">
    </script>
   

</head>
<body>

<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Checks </h2>
                    </div>
                    <form action="" method="post" >
                    <div class="row">
                     <div class="col">
                     <input type="date" id="from" name="from" class="form-control">
                        </div>
                        <div class="col">
                        <input type="date" id="to" name="to" class="form-control">
                        </div>
                    </div><br>
                    <?php 
                    $sqlD="SELECT `user_id`,`user_name` FROM user_info order by `user_name`"; 
                    ?>
                    <div class="row">
                     <div class="form-group col-md-6">
                     
                     <label for="inputState">List</label>
                      <?php  echo 
                      "<select id='select' class='form-control'>User Name</option>"; 
                     foreach ($db->query($sqlD) as $row){
                           echo "<option value=".$row['user_id']." >".$row['user_name']."</option>"; 
                               }
                           echo "</select>";
                           
                      ?>
                     
                     
                      </div>
                     
                    </div>
                   

                  </form>
                  <button class="btn btn-info" id="search"  name="search" >Search</button>
<br>  
                    <?php
                    
                     $selQry=
                     "SELECT `user_id`,`user_name`, SUM(amount) as total_amount
                     from user_info
                     join order_info on user_id = user_fk
                     group by user_id,user_name";
                                
                     $stmt=$db->prepare($selQry);
                     $res=$stmt->execute();
                   $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   
                        echo "<table class='table table-dark table-bordered' > 
                              <thead>
                                    <tr> 
                                        <th> User Name</th>
                                        <th>Total Amount</th>
                                      </tr>
                                    </thead>";
                        foreach($rows as $row) {

                            echo "<tr>
                                <td>" . $row["user_name"] . "</td>" .
                                "<td>" . $row["total_amount"] . "</td>". 


                              "</tr>";

                        }
                        echo "</table>";

                    ?>
                 </div>
            </div>  

             <div id="order">
             </div>
             <div id="product">
             </div>
      
        </div>
    </div>

</body>
<script>
    var orderList=document.getElementById('search');
    orderList.addEventListener('click',search);
    function search(){
        var orderList=document.getElementById('select');
        console.log(orderList.value);
        $.post('selectOrders.php',{
        IDD: orderList.value
        },function(data){
            document.getElementById('order').innerHTML=data;

         console.log('hiiiiii');
      //  var sa=document.getElementsByClassName('show');
      // sa.addEventListener('click',searchp);
      $('.show').click(function(){
        // console.log($(this)[0].id); 
        $.post('selectProduct.php',{
        ID: $(this)[0].id
        },function(data){
          console.log(data);
         document.getElementById('product').innerHTML=data;
        }); 
      })
       function searchp(){
        var sa=document.getElementById('rowdata');
        console.log(sa.value);
        $.post('selectProduct.php',{
        ID: sa.value
        },function(data){
          console.log(data);
         document.getElementById('product').innerHTML=data;
        });
    }

        });
    }

    

</script>
   

</html>
