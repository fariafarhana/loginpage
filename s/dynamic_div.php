<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mainDiv {
            border: 1px solid black;
        }

        .card {
            border: 1px solid red;
            margin: 5px;
        }
    </style>
</head>

<body>
    <h1>Php Dynamic Div</h1>

    <div class="mainDiv">

        <?php

        $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

        foreach ($age as $value) {
            //Handle your php code if required
            $data = $value;

        ?>
        <!-- Creating dynamic html element here -->
            <div class="card">
                <h3> <?php echo "Head : " . $data ?></h3>
                <p> <?php echo "Data " . $data ?> </p>
            </div>

        <!-- Close Php loop bracket by initaiting php -->
        <?php
        }
        ?>
        
    </div>


</body>

</html>