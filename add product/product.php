            <?php

            if(isset($_POST['submit']))
            { 
                
$t_name = $_POST['name'];

$price=$_POST['price'];

$cat_fk=$_POST['cat_fk'];


$image = "images/" . $_FILES["file"]["name"];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $image))
{
echo "done ";
} 
else 
{
echo "Error !!"."<br>";
}}

/*if (!empty($t_name) || !empty($price) || !empty($image) || !empty($cat_fk)) {
$host = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "cafeteria";
   //create connection
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
   echo $t_name.'<br>'.$price.'<br>'.$image.'<br>'.$cat_fk.'<br>';
   if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
   } else {
    $SQL = $conn->prepare("INSERT Into product (`t_name`, `price`, `image`, `cat_fk`) values(?,?, ?,?);");
    $SQL->bind_param("",$t_name,$price,$image,$cat_fk);

    if($SQL->execute()===TRUE) {
        echo 'done' '.'<br>';
    }
    else
    {
        echo "Error:<br>".$conn->error;
    }

    }

}
 */
echo "<br>";
    $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
    Define("DB_USER","root");
    Define("DB_PASS","");
    $db= new PDO($dsn,DB_USER,DB_PASS);
   // var_dump($db)
   if($db){

    echo "connected";
}
    $t_name = $_POST['name'];

    $price=$_POST['price'];
    $image = "images/" . $_FILES["file"]["name"];
    $cat_fk=$_POST['cat_fk'];
    
    
    
    
    $instQry="Insert into student (`t_name`,`price`,`image`,`cat_fk`) values (:sname,:sprice,:simage,:scat_fk)";
    $instmt=$db->prepare($instQry);
    $instmt->bindParam(":sname",$t_name);
    $instmt->bindParam(":sprice",$price);
    $instmt->bindParam(":simage",$image);
    $instmt->bindParam(":scat_fk",$cat_fk);
    $res=$instmt->execute();
    var_dump($res);
    $rowCount=$instmt->rowCount();
    var_dump($rowCount);
    $lid=$db->lastInsertId();
    var_dump($lid);
   

?>
