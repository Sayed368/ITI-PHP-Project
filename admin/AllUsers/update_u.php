<script src="assets/js/jquery.js">
</script>


<?php require_once("../../config.php"); 


require_once(BLA."inc/header.php");
require_once(BL.'function/validation.php');

?> 

<?php require_once("../../config.php"); 
// include database connection file


// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['user_id'];

	$name=$_POST['user_name'];
    $room=$_POST['room_num'];
    $img=$_POST['img'];
	$ext=$_POST['ext'];
    
	// update user data
	$sql = "UPDATE `user_info` SET `user_name`='$name',`room_num`='$room',`img`='$img' ,`ext`='$ext' WHERE `user_id`=".$id;
    $result = $db->query($sql);
	// Redirect to homepage to display updated user in list
	header("Location: all_user.php");
}


?>
<?php
// Display selected user data based on id
// Getting id from url
$user_id = $_GET['id'];
    $sql = "SELECT `user_name`,`room_num`,`img`,`ext` FROM `user_info` WHERE `user_id`=".$user_id;
    $stmt=$db->prepare($sql);
    $result=$stmt->execute();
    // var_dump($result);
    $numrows=$stmt->rowCount();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); #stmt fetch
      // var_dump($rows);
        $name=$rows[0]['user_name'];
        $room = $rows[0]['room_num'];
        $img = $rows[0]['img'];
        $ext  = $rows[0]['ext'];
?>

<div class="col-sm-6 offset-sm-3 border p-3" >
        <h3 class="text-center p-3 bg-primary text-white">Update User</h3>
        <form  method="post" action="update_u.php">
        <input type="hidden" name="user_id" value=<?php echo $_GET['id'];?> class="form-control" >
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="user_name" value=<?php echo $name;?> class="form-control" >
               
            </div>

			<div class="form-group">
                <label >Room No . </label>
                <input type="text" name="room_num" value=<?php echo $room;?> class="form-control" >
            </div>
            <div class="form-group">
                <label >Image </label>
                <input type="text" name="img" value=<?php echo $img;?> class="form-control" >
            </div>
			<div class="form-group">
                <label >Ext </label>
                <input type="text" name="ext" value=<?php echo $ext;?> class="form-control" >
            </div>
			

            
            <input class="btn btn-success" type="submit" name="update" value="Update">
        </form>
       
    </div> 



