<?php require_once("../../function/db.php"); 

// require_once(BLA."inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

    <title>orders</title>
    <script src="../../assets/js/jquery.js">
    </script>
   

</head>
<body>
 <?php 

  

 if($_POST['IDD'])
 {

    $sql = "select oi.order_id,oi.date,oi.amount,u.user_id
    from order_info oi,user_info u
    where oi.user_fk=u.user_id
    and u.user_id=".$_POST['IDD'];
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
         echo "
        <table class='table table-dark table-bordered myTable' > 
        <thead>
              <tr> 
                  <th>Order Date</th>
                  <th>Amount</th>
                  <th>Show Product</th>
                </tr>
              </thead>";
  foreach($rows as $row) {
      $date=$row['date'];
      $amount = $row['amount'];
      
        echo "<tr id='rowdata' value=".$row['order_id'] .">";
        // var_dump($row['order_id']);
        echo "<td>" .$date . " </td>";
        echo "<td>" . $amount  . "</td>";
         echo "<td>" .'<button class="show btn-info"  id='.$row['order_id'].'  >Show</button>'. "</td>";     
        
    }
  echo   "</tr>";
  echo " </table>";
//   var_dump($rows);
 
 } 
 ?>
 <script>
    //     console.log('hiiiiii');
    // var sa=document.getElementById('show');
    // sa.addEventListener('click',searchp);
    // function searchp(){
    //     var sa=document.getElementById('rowdata');
    //     console.log(sa.value);
    //     $.post('selectProduct.php',{
    //     ID: sa.value
    //     },function(data){
    //       console.log(data);
    //      //document.getElementById('product').innerHTML=data;
    //     });
    // }
</script>
</body>

</html>
