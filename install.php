<?php

session_start();

if (isset($_POST["Submit"])) {

    if ($_POST['host'] == "" && $_POST['user'] == "" && $_POST['pass'] == "") { 
        echo "You must specify your hostname, username and password!";
        header("location: install.php");
        exit();
    } else {
        // session initializing 
        $_SESSION['host'] = $_POST['host'];
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];
        header("location: mysql_connect_install.php");
        exit();
    }
}


?>

<!doctype html>

	<head>
   	 <meta charset="utf-8">
		<title>Kava webshop install</title>

	</head>
	<body>

		<div id="header"><h1>Welcome to Kava installation!</h1></div>
		<div class="form">
			<p>Please type database hostname, username and password:</p>
				<form action="install.php" method="post">
				Hostname: <input type="text" name="host"><br>
				<br>
				Username: <input type="text" name="user"><br>
				<br>
				Password: <input type="text" name="pass"><br>
				<br>
				<br>
				<br>
				<input type="submit" name="Submit">
				</form>
		</div>
	</body>
</html>