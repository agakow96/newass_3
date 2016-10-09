<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Edited Project</title>
    </head>

<body>


    <?php

    $prid = filter_input(INPUT_POST, 'prid', FILTER_VALIDATE_INT) or die('missing parameter');

    $prname = filter_input(INPUT_POST, 'prname') or die('missing parameter');

    require_once 'dbcon.php';

    $sql = 'UPDATE Project1db.Projects SET Project_Name=? WHERE Project_ID=?';
    $stmt = $link->prepare($sql);
    $stmt->bind_param('si', $prname, $prid);
    $stmt->execute();

    if ($stmt->affected_rows > 0){
	   echo 'Name updated...';
    }

    ?>

<hr>

    <a href="prinfo.php?prid=<?=$prid?>"><?=$prname?></a>

</body>
</html>