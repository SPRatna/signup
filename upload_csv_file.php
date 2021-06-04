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
            <h1>Upload CSV file in database by using PHP</h1>
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

                        if(isset($_POST['upload']))
                        {
                         if($_FILES['document']['name'])
                         {
                            $filename=explode(".", $_FILES['document']['name']);
                            if($filename[1]=="csv")
                            {
                                $handel=fopen($_FILES['document']['tmp_name'], "r");
                                while($data=fgetcsv[$handel])
                                {
                                    $item1=mysqli_real_escape_string($con, $data[0]);
                                    $item2=mysqli_real_escape_string($con, $data[1]);
                                    $item3=mysqli_real_escape_string($con, $data[2]);
                                    $item4=mysqli_real_escape_string($con, $data[3]);
                                    $query="INSERT INTO `register`(`name`, `email`, `password`, `status`) VALUES('$item1', '$item2', '$item3', '$item4')";
                                    mysqli_query($con, $query);
                                }
                                fclose($handle);
                                print 'CSV file inserted successfully';
                            }
                         }
                         


                        }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                      <div class="custom-file">
                        <input type="file" name="document" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      <input type="submit" name="upload" class="btn btn-outline-success">
                    </form>

                    
                </div>
            </div>
        </div>
        <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        </script>
    </body>
</html>