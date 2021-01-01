<?php

  $conn = mysqli_connect("localhost", "root", "medohadedo", "phpdb");
  // $conn = mysqli_connect("localhost", "root", "root", "cafeteria1");

  if(isset($_POST["from"],$_POST["to"])){


        $from = $_POST["from"] ;                                                       // $_COOKIE["id"]
        $to = $_POST["to"] ;
        $query=mysqli_query($conn,"SELECT status,date,amount,order_id FROM order_info WHERE user_fk = 11 AND date BETWEEN '$from' AND '$to' order by date " ) ;
      $count=mysqli_num_rows($query) ;

      echo "<table> <tr><th>Status</th>
                               <th>Status</th> 
                               <th>Status</th>
                               <th>Action</th> </tr>" ;
        while($row = mysqli_fetch_array($query)){
          echo "<tr ><td>" .$row['status'] ."</td> 
                     <td>" .$row['date'] ."</td>
                     <td>" .$row['amount'] ."</td>
                    " ;
                     if ($row['status'] == "processing"){ 

                      echo "<td>  <a href='delete-order.php?delete=" . $row["order_id"] ." '> <input type='button' value='Delete'> </a></td>" ;
                       
                     }else{
                       echo "<td> </td>" ;
                     }
              
          echo  "</tr>"  ;
          // var_dump ($row) ;
        } echo "</table>" ;
      


  }
?>