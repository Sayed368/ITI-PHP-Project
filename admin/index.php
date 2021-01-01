<?php
require_once("../function/helpers.php");
// require_once("inc/header.php");

?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bola.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">



</head>
<body>
<div class="container-fluid">
  <div class="row">
          <div class="col-md-6">
          <form method="POST" action="process_home_admin.php">
          <h1 class="sub">Order</h1>
          <h4>ADD to user</h4>
          <select class="padd padd2" id="element_6" name="user">
							<option  selected="selected"></option>
                            <?php
                            $y= all("user_info");
                            foreach ($y as $item) {
                             ?>
							<option value="<?php echo $item["user_id"]; ?>" ><?php echo $item["user_name"]; ?></option>

                            <?php } ?>
                        </select>
                        <br><br>
          <div class="card">
    <div class="header">
     <h4>Shopping  total :
       <span id="tot">
       0
       </span>$</h4>
    </div>
    <?php
$x= all("product");
foreach ($x as $item) { ?>
    <div class="product">
      <div>
        <div class="op">
        <span class="remove">X</span>
        <i class="fas fa-heart"></i>
          </div>
      </div>
      <div>
        
        <img width="120"height="100" class="img" src="../assets/images/<?php echo $item["img_name"]; ?>" alt="">
      </div>
      <div class="disc">
        <div class="name"><?php echo $item["name"] ?></div>       
      </div>
      <div class="quant">
        <span class="plus">+</span>
        <span class="qt">0</span>
        <span class="minus">-</span>
      </div>
      <div>
        <h4 class="price">
        <?php echo $item["price"]."EGP" ?>
        </h4>
        <h4 class="pu" > <?php echo $item["price"] ?></h4>
        <input type="hidden" id="prodId" name="prodId" value="<?php echo $item["product_id"] ?>">
      </div>
      
    </div>

<?php }?>
      <div >
      <div>
      </div>
      <div>
        
      </div>

      <div>
        
      </div>
      
    </div>
      <div>
      <div>
        <div >
       
          </div>
      </div>
      <div>
        
       
      </div>
      <div class="disc">
    
        
      </div>
      <div class="quant">

      </div>
      <div>
   
        
      </div>
      
    </div>
  </div> 
         <br>
          <!-- <label for="dob">
          <h4>data/time</h4>
          <input class="padd padd2" type="datetime-local" name="dob_a" id="dob"> -->
          <h4>Room</h4>
          <select class="padd padd2" id="element_6" name="room">
							<option  selected="selected"></option>
                            <?php
                            $y= all("user_info");
                            foreach ($y as $item) {
                             ?>
							<option value="<?php echo $item["room_num"]; ?>" ><?php echo $item["room_num"]; ?></option>

                            <?php } ?>
						</select>
          </label>
          <label for="name">
          <h4>Notes</h4>
          <textarea class="padd padd2" type="note" name="note" placeholder="notes about product" id="name"></textarea>
          </label><br>
          <button type="submit" class="padd3"">confirm</button><br><br><br>
          <?php
$z= all("order_info");
foreach ($z as $item) { ?>
          <input type="hidden" id="ordId" name="ordId" value="<?php echo $item["order_id"]; ?>">

<?php }?>
      </form>
</div>


<div class="col-md-5">
<h2>list of product</h2>
<?php
$x= all("product");
foreach ($x as $item) {

?>
<div style="float:left;padding:10px;">
<img  style="width:70px;height:70px;" src="../assets/images/<?php echo $item["img_name"]; ?>">
<br>
<p><?php echo $item["name"]."<br>" ?></P>
<p><?php echo $item["price"]."&nbspEGP"."<br>" ?></P>
</div>
<?php
}
?>

</div>
<div  style="float:left;padding:10px;" class="col-md-1"><u>admin</u></div>

      </div>
</div>

</div>


<script  src="../assets/js/home.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
