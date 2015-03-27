<?php
session_start();
if (!session_id) {
	header ("location: install.php")
}

$_POST['host']=$_SESSION['host'];
$_POST['user']=$_SESSION['user'];
$_POST['pass']=$_SESSION['pass'];

?>

<!DOCTYPE html>
<head><title>Database setup</title></head>
<body>


<?php
$db_data = fopen ("db_data.txt", "w");
$hostname = $_POST['host']; 
$username = $_POST['user'];
$password = $_POST['pass'];

if($_POST['host'] != '' || $_POST['host'] != NULL){
	$db_data = fopen ("db_data.txt", "w");
	fwrite($db_data, '///host: ' . $hostname . '///User: ' . $username . '///Pass: ' . $password);

	if (isset($_POST['host']) && isset($_POST['user']) && isset($_POST['pass']))
	{
	$mysqlconnect = mysql_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");
	echo "Connected to MySQL";
	}
} else {
	echo "You must specify your host, username and password";
}
?>

<div class="form">
	<p>Please enter the name of MySQL database:</p>

	<form action="mysql_connect_install.php" method="post">
		Database name: <input type="text" name="db_name">
		<br>
		<br>
		<br>
		<input type="submit" name="submit2">

	<?php

	if (isset($_POST['submit2'])) {
		$db_name = $_POST['db_name'];
		$create_db = "CREATE DATABASE {$db_name}";	

		if (mysql_query($create_db)) {
			echo "Database created sucessfully!";
		}else{
			echo "Something went wrong!";
		}
	}
		
	?>
</div>

</body>
</html>