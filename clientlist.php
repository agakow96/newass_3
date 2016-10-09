<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Clients:</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT Client_Name, clients_ID FROM Project1DB.Clients';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cname, $cid);
while($stmt->fetch()){
	echo '<li><a href="clinfo.php?id='.$cid.'">'.$cname.'</a></li>'.PHP_EOL;
}
?>
</ul>


<form method="post" action="addclient.php">
	New Name: <input type="text" name="clname" placeholder="New Name"/>
    New address: <input type="text" name="claddress" placeholder="New adress"/>
    New numb: <input type="text" name="clnumb" placeholder="New number"/>
    New conname: <input type="text" name="clconname" placeholder="New conname"/>
    New zip: <input type="number" name="clzip" placeholder="New zip"/>
    <input type="submit" name="action" value="Add to client" />
</form>

<h2>DELETE CLIENT</h2>
 <form action="deleteclient.php" method="post">
 <select name="cid">
		<?php
		$sql = 'Select Client_Name, `clients_ID` FROM Clients;';
   		$stmt = $link->prepare($sql);
    	$stmt->execute();
    	$stmt->bind_result($clname, $cid);
    while ($stmt->fetch()){
   echo '<option value="'.$cid.'" placeholder="Zip">'.$clname.'</option>'.PHP_EOL;
	}
 ?>
 <input type="submit" value="Delete">
 </select>
 </form>
<a href="projects.php">Go to projects/edit projects</a> 
</body>
</html>