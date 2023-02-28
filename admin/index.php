<!DOCTYPE html>
<?php require("../includes/config.php")?>
<?php require("../includes/functions.inc.php")?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login page</title>
    <script src="../js/bootstrap.min.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

  </head>
  
  <?php
  $error_msg = "";
  if(isset($_POST['login'])){
    $username = get_safe_value($con,$_POST['uname']);
    $password =  get_safe_value($con,$_POST['pass']);
    $select = "SELECT * FROM `admin_users` WHERE `username` = '$username' AND `pasword` = '$password'";
    $go = mysqli_query($con,$select);

    $count = mysqli_num_rows($go);

    echo $count;

    if($count>0){
      $_SESSION['ADMIN_LOGIN'] = 'Yes';
      $_SESSION['ADMIN_USERNAME'] = $username;
      header('location:dashboard.php');
      die();
    }else{
      $error_msg = "Username or Password error ";
    }


  }
  ?>
  
  <body class="text-center">
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="post">
              <h1 class="h3 mb-3 fw-normal">Please Login</h1>
          
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="uname" required  placeholder="username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" required name="pass" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
             <p class="text-danger"><?php echo $error_msg?></p>
              <p class="mt-5 mb-3 text-muted">&copy; 2017–2023</p>
            </form>
          </main>
    </div>
    

  </body>
</html>
