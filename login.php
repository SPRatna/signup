<?php
$con = mysqli_connect('localhost','root','','errortech') or die(mysqli_error($con));
    if($con ==FALSE){
        die("Connection failed due to".mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Errortech | Assignment</title>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1>Assignment of Error Technologies</h1>
            <p>Login by using PHP</p>
          </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_POST['admin_login'])) {
                          session_start();
                          $uname = strip_tags(trim($_POST["admin"]));
                          $pass = strip_tags(trim($_POST["password"]));
                          $username = mysqli_real_escape_string($con,$uname);
                          $password = mysqli_real_escape_string($con,$pass);

                          $query = mysqli_query($con,"SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password'");
                          if(mysqli_num_rows($query)>0){
                            $_SESSION['username'] = $username;
                            $_SESSION['id'] = session_id();
                            $_SESSION['login_type'] = "admin";

                            echo '<script>alert("Login Success.");window.location.assign("upload_csv_file.php");</script>';

                          }
                          else{
                            echo '<script>alert("Username or password is wrong.");window.location.assign("login.php");</script>';
                          }
                        }
                        
                        ?>
                        <form action="" method="POST">
                           <div class="form-group">
                               <label>Username</label>
                               <input type="text" name="admin" class="form-control" required>
                           </div>
                           <div class="form-group">
                               <label>Password</label>
                               <input type="password" name="password" class="form-control" required>
                           </div>
                           <div class="form-group">
                            <input type="submit" name="admin_login" class="btn btn-outline-primary" value="Login">
                           </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>