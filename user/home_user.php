<?php
require_once("../function/helpers.php");
?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo ASSETS?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bola.css">
    <!-- <link rel="stylesheet" href="<?php echo ASSETS?>/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo ASSETS?>/css/style.css"> -->


</head>
<body>

  <div class="container-fluid">
  <div class="row">
          <div class="col-md-6">
          <form method="POST" action="process_home.php">
          <h1 class="sub">Order</h1>
         
         <br>
          <label for="dob">
          <h4>data/time</h4>
          <input class="padd padd2" type="datetime-local" name="dob" id="dob">
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
      </form>
</div>

<div class="col-md-6">
<h2>Latest order</h2>
<?php $_SESSION["user_name"]; ?>
<hr>

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
      </div>
</div>

</div>

<!-- <script  src="<?php echo ASSETS?>/js/jquery.js"></script>
<script src="<?php echo ASSETS?>/js/bootstrap.bundle.min.js"></script> -->
<!-- <script  src="<?php echo ASSETS?>/js/main.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


    

   