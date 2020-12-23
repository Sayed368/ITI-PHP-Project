<?php

class ORM{

    private $db;
    function connect($db_name,$db_host,$db_port,$user,$password)
    {
        try{
            $this->$db_name=$db_name;
            $this->$db_host=$db_host;
            $this->$db_port=$db_port;
            $this->$user=$user;
            $this->$password=$password;
            $dsn="mysql:dbname=$db_name;db_host=$db_host;db_port=$db_port";
            $db= new PDO($dsn,$user,$password);
            $this->db=$db;
            return $db;


        }
        
        catch(PDOException $Exception){
            throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
       
        
       


    }
    function select($tablename)
    {
        $selct='select * from '.$tablename.'';
        $stmt=$this->db->prepare($selct);
        $result=$stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($rows);

        // echo "<table border='2 solid red'> 
        // <tr>
        //     <th>NAME</th>
        //     <th>EMAIL</th>
        //     <th>PHONE</th>
        //     <th>GENDER</th>
        //     <th>DIRTHDAY</th>
        //     <th>ROOM</th>
        // </tr>";

        //     foreach($rows as $row) {
        //     echo "<tr><td>".$row['fname'].' '.$row['lname']."</td>".
        //     "<td>".$row['email']."</td>".
        //     " <td>".$row['phone']."</td>".
        //     " <td>".$row['gender']."</td>".
        //     "<td>".$row['birthday']."</td>".
        //     "<td>".$row['room']."</td></tr>";
        //     }
        //     echo "</table>";
        return $rows;

    }
    function selectRow($tablename,$field,$value)
    {
        $selct='select * from '.$tablename.' where '.$field.'='.'"'.$value.'"';
        // var_dump($selct);
        $stmt=$this->db->prepare($selct);
        $result=$stmt->execute();
        
        if($result){
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows;

        }
        else{
            return false;
        }

    }
    
    function insert($tablename,$values)
    {
        $txt='';
        $txt1='';
        foreach($values as $row=>$values)
        {
            $txt.=$row.' , ';
           
            $txt1.='"'.$values.'"'.' , ';
           

        }
        $txt=rtrim($txt,' , ');
        $txt1=rtrim($txt1,' , ');
        $insert='insert into '.$tablename.'('.$txt.') values ('.$txt1.')';
        //echo $insert;
        $insstmt=$this->db->prepare($insert);
        $insert_result=$insstmt->execute();
        // $connection->errorInfo();
        return $insert_result;
       

    }
    function testconn(){
        if(isset($this->db))
        {
            return true;
        }
        else{
            return false;
        }
    }
}


// define('DB_HOST','127.0.0.0.1');
// define('DB_USER','root');
// define('DB_PASSWORD','root');
// define('DB_NAME','students_data');
// define('DB_PORT','3307');
// $db=$newconnection->connect('students_data','127.0.0.1','3306','root','root');

$newconnection= new ORM();
$db=$newconnection->connect('cafeteria','127.0.0.1','3306','root','root');
//var_dump($newconnection->testconn());
?>