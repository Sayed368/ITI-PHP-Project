
<?php
if(isset($_SESSION['user_name']))
{
  header("location:",BURLA.'login.php');  
} 

?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo ASSETS?>/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="<?php echo ASSETS?>/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo ASSETS?>/css/style.css"> -->


</head>
<body>

<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Cafe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item dropdown  active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">view user</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo ASSETS?>">add user</a>
       
        </div>
      </li>
      <li class="nav-item  active">
        <a class="nav-link " href="#">Manual Order</a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link " href="#">Checks</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="float:right ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container-fluid">
