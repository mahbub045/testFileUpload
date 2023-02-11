<?php 
  include("dataconfig.php");
  $s_msg=null;

  if (isset($_POST['send_msg'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];

    $sscFile=uniqid().$_FILES['sscFile']['name'];
    $file_tmp_location=$_FILES['sscFile']['tmp_name'];
    $myFile_store="ff/".$sscFile;

    move_uploaded_file($file_tmp_location, $myFile_store);

    $hscFile=uniqid().$_FILES['hscFile']['name'];
    $file_tmp_location2=$_FILES['hscFile']['tmp_name'];
    $myFile_store2="ff/".$hscFile;

    
    move_uploaded_file($file_tmp_location2, $myFile_store2);
    
    $insertSql="INSERT INTO contactinfo (name, email, sscFile, hscFile) VALUES ('$name', '$email', '$sscFile', '$hscFile')";
    if($connection-> query($insertSql)){
     header("location:test.php");
     $s_msg="Send Successed1";
    }
    else {
         echo error;
    }
    

    
  }

  // $connection-> query($insertSql)

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <title>file up test</title>
</head>
<body>
     <div class="col-md-7">
          <form action="test.php" method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Full Name" required>

          <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your Email" required>

          <input type="file" class="form-control pt-3 mb-1" id="sscFile" name="sscFile" accept="application/pdf">
          <label class="mb-3 text-light" id="sscFile">SSC documents on PDF or Image format.</label>

          <input type="file" class="form-control pt-3 mb-1" id="hscFile" name="hscFile" accept="application/pdf, image/*">
          <label class="mb-3 text-light" id="hscFile">HSC documents on PDF or Image format.</label>

          <br>

          <button type="submit" name="send_msg" class="btn btn-primary">SEND MESSAGE</button>
          <div class="text-danger">
             <?php echo $s_msg;?>
        </div>
        </form>
        <div>
          <a href="index.php">home</a>
        </div>
        
     </div>

     
     
</body>
</html>