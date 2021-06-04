<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <script type="text/javascript" src="assets/jQuery.js"></script>
        <script type="text/javascript" src="assets/popper.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap.min.js"></script>
        <title>Errortech | Assignment</title>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1>Assignment of Error Technologies</h1>
            <p>Signup Form</p>
          </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <?php
                    $con = mysqli_connect('localhost','root','','errortech') or die(mysqli_error($con));
                        if($con ==FALSE){
                            die("Connection failed due to".mysqli_connect_error());
                        }


                     if(isset($_POST['register'])){
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        
                        $query="INSERT INTO `register`(`name`, `email`, `password`, `status`) VALUES('$name', '$email', '$password', '1')";
                        if (mysqli_query($con,$query)) {
                            echo '<script>alert("Registration Has Been Successfully Added.");window.location.assign("index.php");</script>';
                          }
                          else {
                            echo '<script>alert("Invalid data type");window.location.assign("index.php.php");</script>';
                            //echo mysqli_error($con);
                          }
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" name="name" class="form-control" required="required" minlength="2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Password</span>
                            </div>
                            <input type="text" name="password" class="form-control" required="required" minlength="6">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" class="btn btn-outline-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>