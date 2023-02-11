<?php 
  include("dataconfig.php");
  $s_msg=null;

  if (isset($_POST['send_msg'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $myFile=uniqid().$_FILES['myFile']['name'];
    $file_tmp_location=$_FILES['myFile']['tmp_name'];
    $myFile_store="ff/".$myFile;

    move_uploaded_file($file_tmp_location, $myFile_store);

    $insertSql="INSERT INTO cinfo (name, email, myFile) VALUES ('$name', '$email', '$myFile')";
    if($connection-> query($insertSql)){
     header("location:index.php");
     $s_msg="Send Successed1";
    }
    else {
         echo error;
    }
    

    
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title>file up</title>
</head>
<body>
     <div class="col-md-7">
          <form action="index.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Full Name" required>

          <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your Email" required>

          <input type="file" class="form-control pt-3 mb-1" id="myFile" name="myFile" accept="application/pdf">
          <label class="mb-3 text-light" id="myFile">SSC documents on PDF or Image format.</label>

          <br>

          <button type="submit" name="send_msg" class="btn btn-primary">SEND MESSAGE</button>
          
        </form>
        <div class="text-danger">
             <?php echo $s_msg;?>
        </div>

        <a href="test.php">Test</a>
        <a href="admin.php">admin</a>
     </div>

     
     
</body>
</html>