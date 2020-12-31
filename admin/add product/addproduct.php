<?php require_once("../../config.php"); 
// include database connection file



?> 

<?php  
require_once("../../config.php");

if(isset($_POST['submit']))
{

    $name=$_POST['name'];
	$price=$_POST['price'];
    $img_name= "images/" . $_FILES["file"]["name"];
	
    
	// insert product data 
	 $array=['name'=>$name,'price'=>$price,'img_name'=>$img_name];
    $insert=$newconnection->insert('product',$array);
  
    // // $sql="INSERT INTO `product` (`name`, `price`, `image`)
    // // VALUES ('tea', 10, 'img')";
    // //  $result = $db->query($sql);
    //  if ($insert){​​​​​
    //     echo ("Added Succsseful");
    // }​​​​​
    // else{​​​​​
    //   echo ("Faild To Add");
    // }​​​​​
    
  
    //   $sql = "INSERT INTO `product` (`name`, `price`)
    //   VALUES ('tea', 10)";
      
    //   if ($db->query($sql) === TRUE) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $db->error;
      
      
 
}
// var_dump($_POST)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product </title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
    

    <link href="style.css" rel="stylesheet" media="all">
</head>
<body>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
<div class="wrapper wrapper--w780">
    <div class="card card-3">
        <div class="card-heading"></div>
        <div class="card-body">
            <h2 class="title" >Add Product</h2>
            <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Product Name" name="name">
                </div>
                <div class="input-group">
                    
                    <input class="input--style-3" type="number" placeholder="price" name="price">
                    
                </div>
               
              
                    <?php 
                    $sqlD="SELECT * FROM categories order by `cat_name`"; 
                    ?>
                     <div class="input-group">
                    <label for="category" style="color: black;" > category  :</label>
                    <br> 

                      <?php 
                       echo 
                      "<select id='select' class='form-control'></option>"; 
                     foreach ($db->query($sqlD) as $row){
                           echo "<option >".$row['cat_name']."</option>"; 
                               }
                           echo "</select>";
                           echo "<br>"
                      ?> 
                      
                    <a href="addcategories.php">add category</a>
                </div>
                <div class="input-group">
                    <label for="product-picture" style="color: black;" > product picture  : </label>
                        <br>  <input type="file" name="file">

                  
                </div>

                <div class="p-t-10">
                    <input class="btn btn--pill btn--sub" type="submit" name="submit" value="add " />
                   
                    <input class="btn btn--pill btn--sub" type="reset" name="reset" value="reset" />

                </div>
            </form>
        </div>
    </div>
</div>
</div> 
</body>
