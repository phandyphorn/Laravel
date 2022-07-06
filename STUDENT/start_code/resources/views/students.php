<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    
    <?php 
        foreach ($students as $stu){
    ?>
        <ul>
            <li><?php echo $stu['name']; ?> in class <?php echo $stu['class']; ?> is  <?php echo $stu['age']; ?> </li>
        </ul>
    <?php
        };
    ?>
</body>

</html>