<?php require_once("../config.php"); 


require_once(BLA."inc/header.php");
require_once(BL.'function/validation.php');  ?>


    <?php 

        if(isset($_POST['submit']))
        {
            $name = sanitizeString($_POST['name']);
            $notEmpty = checkEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLess($name,3);
                if($less)
                {
                    $arr=['cat_name'=>$name];
                    $insert=$newconnection->insert('categories',$arr);
                    $success_message = $name.' Adedd Succssfully';
                }
                else 
                {
                    $error_message = "Please Type Correct Categorie";
                }
            }
            else 
            {
                $error_message = "Please Type Categorie Name";
            }

            require BL.'function/messages.php';
        }


    ?>


    <div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Add New Categorie</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name Of Categorie</label>
                <input type="text" name="name" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
       
    </div>



<?php require BLA.'inc/footer.php';  ?>
