<?php require_once("../config.php"); 

require_once(BLA."inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checks</title>
</head>
<body>
<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Checks </h2>
                    </div>
                    <form action="">
                    <div class="row">
                     <div class="col">
                     <input type="date" id="from" name="from" class="form-control">
                        </div>
                        <div class="col">
                        <input type="date" id="to" name="to" class="form-control">
                        </div>
                    </div><br>
                    <?php 
                    $sqlD="SELECT `user_name` FROM user_info order by `user_name`"; 
                    ?>
                    <div class="row">
                     <div class="form-group col-md-6">
                        <label for="inputState">List</label>
                      <?php  echo "<select name=user value='' class='form-control'>User Name</option>"; 

                       foreach ($db->query($sqlD) as $row){//Array or records stored in $row

                           echo "<option >$row[user_name]</option>"; 
             }
                           echo "</select>";
            ?>
                      </div>
                    </div>
                    
                  
                  </form>
<br>  
                    <?php
                     $selQry="select `user_id`,`user_name`,`amount` from `user_info`,`order_info`,`order_product` where  user_id=user_fk and order_id=order_fk;";
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
                                "<td>" . $row["amount"] . "</td>". 
                               

                              "</tr>";
                         
                        }
                        echo "</table>";

                   


                    ?>
         </div>
            </div>        
        </div>
    </div>

 
</body>
</html>


