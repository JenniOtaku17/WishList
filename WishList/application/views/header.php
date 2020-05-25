<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wish List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="https://static.thenounproject.com/png/101501-200.png" />
</head>
<body style="height:1500px">
<style>
body {

  background-image: url("https://i.pinimg.com/originals/e0/cc/29/e0cc29b575ea0eb8b805ddff2f148829.jpg");

}
</style>
<?php 
    $base_url = load_class('Config')->config['base_url'];
    $user = $this->session->get_userdata();
    if(isset($user['name']) and isset($user['id'])){
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="#">WishList</a>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href="'.$base_url.'index.php/movie">Movie List</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="'.$base_url.'index.php/user/wishList">'.$user['name'].'`s Wish List</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="'.$base_url.'index.php/user/logout">Log Out</a>
        </li>
    </ul>
    </div>
    </nav>';

   }else{
       echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
       <a class="navbar-brand" href="#">WishList</a>
       <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
       <ul class="navbar-nav ml-auto">
           <li class="nav-item">
           <a class="nav-link" href="'.$base_url.'index.php/user/login">Login</a>
           </li>
           <li class="nav-item">
           <a class="nav-link" href="'.$base_url.'index.php/user/register">Sign Up</a>
           </li>
       </ul>
       </div>
     </nav>';
   }
?>

<br><br><br>