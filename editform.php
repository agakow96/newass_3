<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Edit Form</title>
    </head>

<body>


    <?php

    $prid = filter_input(INPUT_GET, 'prid', FILTER_VALIDATE_INT) or die('missing parameter');

    require_once 'dbcon.php';

    $sql = 'SELECT Project_Name FROM Project1db.Projects WHERE Project_ID=?';
    $stmt = $link->prepare($sql);
    $stmt->bind_param('i', $prid);
    $stmt->execute();
    $stmt->bind_result($prname);

    while ($stmt->fetch()) {}
        echo 'Project Name:'.$prname;
    ?>

<form method="post" action="editpr.php">
	<input type="hidden" name="prid" value="<?=$prid?>" >
	New Name: <input type="text" name="prname" placeholder="New Name" value="<?=$prname?>" />
    <input type="submit" name="action" value="submit" />
</form>

</body>
</html>