<?php require_once("../config.php"); 
require_once(BL.'function/validation.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link href="<?php echo ASSETS ?>/css/style" rel="stylesheet">

<!------ Include the above in your HEAD tag ---------->

<body>

<?php
        if(isset($_POST['submit']))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            if(checkEmpty($email)&&checkEmpty($password))
            {
                if(validEmail($email))
                {
                        $select=$newconnection->selectRow('user_info','email',$email);
                        // var_dump($select); 
                        $user_email='';
                        $user_name='';
                        $user_password='';
                        $user_id;

                        foreach($select as $row) {
                            $user_password.=$row['password'];
                            $user_email=$row['email'];
                            $user_name=$row['user_name'];
                            $user_id=$row['user_id'];
                        }  
                        

                        // $check_password=password_verify($password,$user_password);
                        
                        if($user_password==$password)
                        {
                            $_SESSION['user_name']=$user_name;
                            $_SESSION['user_email']=$user_email;
                            $_SESSION['user_id']=$user_id;
                            header("Location:".BURL.'index.php');
                        }
                        else{
                            $error_message="Data Not Valid";
                        }

                }else{
                    $error_message="Email Not Valid";
                }


            }
            else{
                $error_message="Please Fill Input";
            }
        }
?>



    <div id="login">
        <!-- <h3 class="text-center text-white pt-5">Login form</h3> -->
        <div class="container">
            <div class='row'>
            <?php require_once(BL.'function/messages.php'); ?>
            
            </div>
            <div id="login-row" class="row justify-content-center align-items-center">
            
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off"> 
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js" ></script>
<script src="<?php echo ASSETS; ?>/js/popper.min.js" ></script>
<script src="<?php echo ASSETS; ?>/js/bootstrap.min.js" ></script>

</body>

</html>

