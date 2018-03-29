<?php

	if( isset($_POST['submit'])){
		$name = $_POST['name'];
		$password = $_POST['password'];

		setcookie('name', $name);
		header('Location: index.php');
	}

?>