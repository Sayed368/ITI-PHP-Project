<?php require_once("../../function/db.php");
if(isset($_POST['userid']))
 {
     if(isset($_POST['dateFrom']) && isset($_POST['dateTo']))
     {
        if($_POST['dateFrom']!=0 && $_POST['dateTo']==0)
        {
            $print=1;
            $date='"'.$_POST['dateFrom'].'"';
       
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date > '.$date.' order by date desc ');
            
        }  
        if($_POST['dateFrom']==0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $date='"'.$_POST['dateTo'].'"';
           
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date < '.$date.' order by date desc ');
           
        }  
        if($_POST['dateFrom']!=0 && $_POST['dateTo']!=0)
        {
            $print=1;
            $dateFrom='"'.$_POST['dateFrom'].'"';
            $dateto='"'.$_POST['dateTo'].'"';
            
            ordersDateForUser('select order_id,date,price from order_info where user_id='.$_POST['userid'].' and date between '.$dateFrom.' and '.$dateto.' order by date desc ');
            
        }  
        
     }
     
 }


 function ordersDateForUser($query)
{
    // $res=$user -> executeQuery($query);
    // $records=$res -> fetchAll(PDO::FETCH_ASSOC);
    $stmt=$db->prepare($query);
    $result=$stmt->execute();
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
    if($result -> rowCount() !=0)
    {
        $lastOrderDate=array_values($rows[0])[0];
        for($i=0;$i<count($rows);$i++)
        {
            echo '<tr id='.$rows[$i]['order_id'].' class= orderrow'.'>
            <td>'.$rows[$i]['date'].'</td>'.'<td>'.$rows[$i]['price'].'</td>';
        }
        echo '</tr>';
        
    }
}