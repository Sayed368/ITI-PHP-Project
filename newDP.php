<?php
  $count=0;
  $query="" ;
  $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");
    if(!$conn) {
       die("Connection Failed:" .mysqli_connect_error() ) ;
    }
          // SELECT status,date,amount FROM order_info WHERE user_fk = 26 AND date BETWEEN ' 2020-12-02 22:13:00' AND '2020-12-17 21:27:00' order by date
                     
      
      $query=mysqli_query($conn,"SELECT status,date,amount,order_id  FROM order_info where user_fk = 11 " ) ;
      $count=mysqli_num_rows($query) ;
       
    
?>



<!DOCTYPE html>

<html>
<head>
<center>
      <h2>PHP DatePicker</h2>
     <?php echo ($count) ; ?>
      <script  src="js/jqueryy.js"></script>
</head>
<body>
<form  method="post">
    <input type="date"  name="FromDate" id="from">
    <input type="date" name="ToDate" id="to">
    <p>
    <input type="submit" name="search" id="search" value="SearchDate....">
    </p>
    <?php
      if($count == "0")
      {
        echo '<h2>notfound</h2>' ;
      }
      else{  echo "<div id='table'> <table> <tr><th>Status</th>
                               <th>Status</th> 
                               <th>Status</th>
                               <th>Action</th> </tr>" ;
        while($row = mysqli_fetch_array($query)){
          echo "<tr ><td>" .$row['status'] ." |<input type='button' class='displayorder' id=$row[order_id] value='View'></td> 
                     <td>" .$row['date'] ."</td>
                     <td>" .$row['amount'] ."</td>
                    " ;
                     if ($row['status'] == "processing"){ 

                      echo "<td> <a href='delete-order.php?delete=$row[order_id]  '> <input type='button' value='Delete'> </a></td>" ;
                       
                     }else{
                       echo "<td> </td>" ;
                     }
              
          echo  "</tr>"  ;
          // var_dump ($row) ;
        } echo "</table> </div>" ;


      
    }
    ?>

    <div class="container"  id="orderdetails"></div>

</form>
</center>
</body>
  <script src="js/MyOrder.js"></script>
  
</html>

