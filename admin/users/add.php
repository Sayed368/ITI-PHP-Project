<?php require_once("../../config.php"); 


require_once(BLA."inc/header.php");
require_once(BL.'function/validation.php');

?>

<?php

		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$confpassword=$_POST['confpassword'];
			$room=$_POST['room'];
			$ext=$_POST['ext'];

			$uploadfile=$_FILES['img'];
			$filename=$uploadfile['name'];
			$filesize=$uploadfile['size'];
			$filetmpname=$uploadfile['tmp_name'];
			$fileinfo=explode('.',$filename);  //array[filename , fileextention]
			$extention=end($fileinfo); //last index in file info array 
			
			$img_dir='user_img/'.$filename;

			if(checkEmpty($name)&&checkEmpty($email)&&checkEmpty($password)&&checkEmpty($confpassword)&&checkEmpty($room)&&checkEmpty($ext)&&checkEmpty($uploadfile)){

				if(validEmail($email))
				{
					if($password==$confpassword)
					{
						if(validImage($extention)){
							// var_dump($uploadfile);
							// echo "valid image".'<br>';
							// echo $filename.'<br>';
							// echo $filesize.'<br>';
							// echo $filetmpname.'<br>';
							// echo $fileinfo.'<br>';
							// echo $extention.'<br>';
							// echo $img_dir;
							move_uploaded_file($filetmpname,$img_dir);

							// $passwordnew=password_hash($password,PASSWORD_DEFAULT);
							$passwordnew=$password;
							$confpasswordnew=password_hash($confpassword,PASSWORD_DEFAULT);

							$arr=['user_name'=>$name,'email'=>$email,'password'=>$passwordnew,'ext'=>$ext,'room_num'=>$room,'img_name'=>$filename,'img_dir'=>$img_dir];

							$insert=$newconnection->insert('user_info',$arr);
							if ($insert){
								$success_message = "Added Succsseful";

							}else{
								$error_message="Faild To Add";

							}

						}
						else{
							$error_message="Image Not Valid";

						}
						
						

					}
					else{
						$error_message="not matching password";

					}
					

					
					
				}else{
					$error_message="please type correct email";
				}

			}
			else{
				$error_message="please fill all fildes";
			}

			require_once(BL.'function/messages.php');
			

		}
?>


<div class="col-sm-6 offset-sm-3 border p-3" >
        <h3 class="text-center p-3 bg-primary text-white">Add New User</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label >Name </label>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>

            <div class="form-group">
                <label >Email </label>
                <input type="email" name="email" class="form-control" autocomplete="off">
            </div>

            <div class="form-group">
                <label >Password </label>
                <input type="password" name="password" class="form-control" autocomplete="off">
            </div>
			<div class="form-group">
                <label >Confirm Password </label>
                <input type="password" name="confpassword" class="form-control" autocomplete="off">
            </div>
			<div class="form-group">
                <label >Room No . </label>
                <input type="number" name="room" class="form-control" min="1" autocomplete="off">
            </div>
			<div class="form-group">
                <label >Ext </label>
                <input type="number" name="ext" class="form-control" autocomplete="off">
            </div>
			<div class="form-group">
                <label >Image </label>
                <input type="file" name="img" class="form-control" >
            </div>

            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>

	<?php

require_once(BLA."inc/footer.php");
?>
