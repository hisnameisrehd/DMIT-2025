<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test User Input</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    $input = $_POST['input'];
    if (isset($_POST['mysubmit'])) {
        echo $input; //testing
        if ($input != "") {
            echo "<p>" . createSafeFileName($input) . "</p>";
        }
    } // \if submit
    function createSafeFileName($word)
    {
        echo $word;
        $word = strtolower($word);
        $word = str_replace(" ", "-", $word);
        $word = substr($word, 0, 16);
        $word = $word . ".html";
        echo $word;

        return $word;
    } // \createSafeFileName
    ?>

    <div id="smaller" class="container">

        <h1>User Input Test</h1>



        <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-group">
                <label for="input">User Input:</label>
                <input type="text" class="form-control" name="input" value="<?php echo $input ?>">
            </div>

            <input type="submit" class="btn btn-primary" name="mysubmit">
        </form>



</body>

</html>