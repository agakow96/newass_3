<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
$cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) or die('missing parameter');
    echo $cid;
?>

<h1>Details for client with ID <?=$cid?>:</h1>
<ul>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dbcon.php';
$sql = 'SELECT Client_Name, Client_Address, Zip_Code_Zip_Code, Client_contact_number FROM clients where Clients_ID=?';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($clname, $claddress, $clzip, $clcontact);

while($stmt->fetch()){

	echo '<li><a href="filmlist.php?cid='.$cid.'">'.$clname.'</a></li>'.PHP_EOL;
	echo '<li> Address: '.$claddress.', '.$clzip.'</li>';
	echo  '<li> Contact number : '.$clcontact.'</li>';
}

?>
</ul>

</body>
</html>