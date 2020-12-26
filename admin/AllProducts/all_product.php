<?php require_once("../../config.php"); 

require_once(BLA."inc/header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">All Products </h2>
                        <a href="form.html" class="btn btn-success pull-right">Add New Product</a>
                    </div>
                    <?php
                     
                    
                   
                          $selQry="select `product_id`,`name`,`price`,`image` from product";
                          $stmt=$db->prepare($selQry);
                          $res=$stmt->execute();
                          #fetch the result
                        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class='table table-bordered table-striped' border=10> 
                              <thead>
                                    <tr> 
                                       
                                        <th> Product</th>
                                      
                                        <th>Price</th>
                                        
                                        <th> Image</th>
                                        
                                        <th> Action</th>
                                
                                      </tr>
                                    </thead>";
                        foreach($rows as $row) {

                            echo "<tr>
                               
                                <td>" . $row["name"] . "</td>" .
                               
                                "<td>" . $row["price"] . "</td>". 
                               
                                "<td>" . $row["image"] ."</td>" .
                                
                                "<td>" ."<a href='update_p.php?id=". $row['product_id'] ."' title='Update Record' 
                                data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>",
                                "<a href='delete_p.php?id=". $row['product_id'] ."' title='Delete Record' 
                                data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"
                              
                                
                                ."</td>
                                </tr>";
                         
                        }
                        echo "</table>";

                   


                    ?>
 </div>
            </div>        
        </div>
    </div>
</body>
</html>





























<?php

require_once(BLA."inc/footer.php");
?>
