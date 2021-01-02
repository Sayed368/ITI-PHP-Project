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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
        <center>
    <h2 class="pull-left">All Orders </h2>
    </center>
     <?php 
    //  echo ($count) ; 
     ?>
      <script  src="jqueryy.js"></script>
</head>
<body>
<div class="container">
<form  method="post">
     <div class="row">
     <div class="col-6">
    <input type="date"  name="FromDate" id="from" class="form-control"></div>
    <div class="col-6">
    <input type="date" name="ToDate" id="to" class="form-control"></div>
    </div><br>
    <div class="row">
     <div class="col-6">
    <input type="submit" name="search" id="search" value="SearchDate...." class="form-control">
    </div>
    </div>
    <br>
    <?php
      if($count == "0")
      {
        echo '<h2>notfound</h2>' ;
      }
      else{  echo "<div id='table'> <table class='table table-dark table-bordered'  > <tr><th>Status</th>
                               <th>Date</th> 
                               <th>Amount</th>
                               <th>Action</th> </tr>" ;
        while($row = mysqli_fetch_array($query)){
          echo "<tr ><td>" .$row['status'] ." |<input type='button'  class='displayorder btn btn-info' id=$row[order_id] value='View'></td> 
                     <td>" .$row['date'] ."</td>
                     <td>" .$row['amount'] ."</td>
                    " ;
                     if ($row['status'] == "processing"){ 

                      echo "<td> <a href='delete-order.php?delete=$row[order_id]  '> <input type='button' class='btn btn-info' value='Delete'> </a></td>" ;
                       
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

 </div>
</body>
  <script src="MyOrder.js"></script>
  
</html>

