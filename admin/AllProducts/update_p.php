


<?php require_once("../../config.php"); 


require_once(BLA."inc/header.php");
require_once(BL.'function/validation.php');

?> 

<?php require_once("../../config.php"); 
// include database connection file


// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['product_id'];
    $name=$_POST['name'];
	$price=$_POST['price'];
  
    $img=$_POST['image'];
	
    
	// update user data
	$sql = "UPDATE `product` SET `name`='$name',`price`='$price',`image`='$img'  WHERE `product_id`=".$id;
    $result = $db->query($sql);
	// Redirect to homepage to display updated user in list
	header("Location: all_product.php");
}


?>
<?php
// Display selected user data based on id
// Getting id from url
$product_id = $_GET['id'];
    $sql = "SELECT `name`,`price`,`image` FROM `product` WHERE `product_id`=".$product_id;
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    // var_dump($result);
    $numrows=$stmt->rowCount();
      
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); #stmt fetch
      // var_dump($rows);
        $name=$rows[0]['name'];
        $price = $rows[0]['price'];
        $img = $rows[0]['image'];
        
?>

<div class="col-sm-6 offset-sm-3 border p-3" >
        <h3 class="text-center p-3 bg-primary text-white">Update Product</h3>
        <form  method="post" action="update_p.php">
        <input type="hidden" name="product_id" value=<?php echo $_GET['id'];?> class="form-control" >
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="name" value=<?php echo $name;?> class="form-control" >
               
            </div>

			<div class="form-group">
                <label >price  </label>
                <input type="text" name="price" value=<?php echo $price;?> class="form-control" >
            </div>
            <div class="form-group">
                <label >Image </label>
                <input type="text" name="image" value=<?php echo $img;?> class="form-control" >
            </div>
			

            
            <input class="btn btn-success" type="submit" name="update" value="Update">
        </form>
       
    </div> 



