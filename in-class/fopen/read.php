<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fopen Write</title>
</head>
<body>
    <?php

        /*
        
        3 methods of fopen()

            w = write
            a = append
            r = read

        */

        $handle = fopen("datafile.txt", "r"); // open text file for editing

        if($handle)
        {
            while(!feof($handle))
            {
                $buffer = fgets($handle, 4096);
                $existingText .= $buffer;
            }// \loop
            echo $existingText;
            fclose($handle);
        }


    ?>
</body>
</html>