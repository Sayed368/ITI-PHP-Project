<?php require_once("../../config.php"); 
// include database connection file



?> 

<?php  
require_once("../../config.php");

if(isset($_POST['submit']))
{

    $name=$_POST['name'];

	
    
	// insert product data 
	 $array=['cat_name'=>$name];
    $insert=$newconnection->insert('categories',$array);
  
    
      
      
 
}
// var_dump($_POST)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add categories </title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
    

    <link href="style.css" rel="stylesheet" media="all">
    
</head>
<body>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
<div class="wrapper wrapper--w780">
    <div class="card card-3" >
        
        <div class="card-body">
            <h2 class="title" >Add categories</h2>
            <form method="POST" action="addcategories.php" enctype="multipart/form-data">
                <div class="input-group">
                    <input class="input--style-3" type="text" placeholder="Category Name" name="name">
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
