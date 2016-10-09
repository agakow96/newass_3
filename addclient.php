<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add New Client</title>
</head>

<body>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clname = filter_input(INPUT_POST, 'clname') or die('missing parameter name');
$claddress = filter_input(INPUT_POST, 'claddress') or die('missing parameter address');
$clnumb = filter_input(INPUT_POST, 'clnumb') or die('missing parameter numb');
$clconname = filter_input(INPUT_POST, 'clconname') or die('missing parameter colname');
$clzip = filter_input(INPUT_POST, 'clzip', FILTER_VALIDATE_INT) or die('missing parameter zip');

require_once 'dbcon.php';

echo 'Add new client';
echo 'Name: ' . $clname . ', Address: ' . $claddress . ', Numb: ' . $clnumb . ', Conname: ' . $clconname . ', Zip: ' . $clzip;

$sql = "INSERT INTO Project1db.Clients (Client_Name, Client_Address, Client_contact_number, Clients_contact_Name, Zip_Code_Zip_Code) VALUES (?, ?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssssi", $clname, $claddress, $clnumb, $clconname, $clzip);

$result = $stmt->execute();

if (!$result) {
    throw new Exception($link->error);
}
else {
	echo "Client added to the database.";
}

?>

<a href="clientlist.php">Back to clientlist</a> 


</body>
</html>