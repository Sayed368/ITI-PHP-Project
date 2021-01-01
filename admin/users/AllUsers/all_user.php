<?php require_once("../../../function/db.php"); 

// require_once(BLA."inc/header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All user</title>
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
                        <h2 class="pull-left">All Users </h2>
                        
                        <a href="../add.php" class="btn btn-info pull-right">Add New User</a>
                    </div>
                    <?php

                          $selQry="select `user_id`,`user_name`,`room_num`,`img_name`,`img_dir`,`ext` from user_info";
                          $stmt=$db->prepare($selQry);
                          $res=$stmt->execute();
                          #fetch the result
                        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class='table table-dark table-bordered' > 
                              <thead>
                                    <tr> 
                                       
                                        <th> Name</th>
                                      
                                        <th>Room</th>
                                        
                                        <th> Image</th>
                                        <th>Ext</th>
                                        <th> Action</th>
                                
                                      </tr>
                                    </thead>";
                        foreach($rows as $row) {

                            echo "<tr>
                               
                                <td>" . $row["user_name"] . "</td>" .
                                "<td>" . $row["room_num"] . "</td>". 

                                "<td>" . 


                                 "<img alt='profile pic' src= ".'../../users/'.$row['img_dir']." height=50 width=70 />"

                                ."</td>" .
                                "<td>" . $row["ext"] . "</td>". 
                                "<td>" ."<a href='update.php?id=". $row['user_id'] ."' title='Update Record' 
                                data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>",
                                "<a href='delete.php?id=". $row['user_id'] ."' title='Delete Record' 
                                data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"
                                ."</td></tr>";
                               
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

// require_once(BLA."inc/footer.php");
?>