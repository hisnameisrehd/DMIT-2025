<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- You must add the enctype attribute or the upload will fail -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="myfile"><br />
<input type="submit" name="mysubmit">
</form>

<?php

if(isset($_POST['mysubmit'])){
    // echo "<pre>";
    // print_r($_FILES['myfile']);
    // echo "</pre>";
    
    // echo "Uploadedfile: " . $_FILES['myfile']['name'] . "<br />";
    // echo "Type: " . $_FILES['myfile']['type'] . "<br />";
    // echo "Size: " . $_FILES['myfile']['size'] . "<br />";
    // echo "Tmp name: " . $_FILES['myfile']['tmp_name'] . "<br />";
    // echo "Errors: " . $_FILES['myfile']['error'] . "<br />";
    
    // move_uploaded_file
    // if(move_uploaded_file ( $_FILES['myfile']['tmp_name'] , "uploaded-files/" . $_FILES['myfile']['name'] )){
    //     echo "<h3>success</h3>";
    // } else {
    //     echo "<h3>ERROR</h3>";
    // }

    $valid = 1;
    $valMessage .= "";

    // check type
    if($_FILES['myfile']['type'] != "image/jpeg"){
        $valid = 0;
        $valMessage .= "Not a JPEG image.";
    }

    // check size
    if($_FILES['myfile']['size'] > (10 * 1024 * 1024)){
        $valid = 0;
        $valMessage .= "Image too large. Cannot be over 10MB.";
    }


    if($valid == 1){
        // move_uploaded_file
        if(move_uploaded_file ( $_FILES['myfile']['tmp_name'] , "uploaded-files/" . $_FILES['myfile']['name'] )){
            echo "<h3>UPLOADED</h3>";
        } else {
            echo "<h3>ERROR</h3>";
        }
    } else {
        echo "<h3>ERROR</h3>";
    }
}

?>

</body>
</html>