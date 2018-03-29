<?php

if(isset($_COOKIE["name"]) && !empty($_COOKIE["name"])){
	if (isset($_GET['reset'])){
		unset($_COOKIE["name"]);
		setcookie('name', '', time() - 3600, '/');
		header('Location: index.php');
	}
	$flag = TRUE;
}else{
	$flag = FALSE;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form with Password</title>
</head>
<body>

<?php 
if( !$flag){
	echo ("
	<form name='form' action='output.php' method = 'POST'>
		<p><strong>Name:</strong> 
		<input maxlength='25' size='15' name='name' onkeyup='condition()' onchange='condition()'></p>
		<p><strong>Password:</strong> 
		<input type='password' maxlength='25' size='15' name='password' onkeyup='condition()' onchange='condition()'></p>
		<input type = 'submit' name='submit' value='Enter'/>
	</form>
	");

}else{
	echo ("
	<h4>Hello, " . htmlspecialchars($_COOKIE["name"]) . " !</h4>
     <a href='?reset=yes'>It's not me</a>
     ");
}
?>

<script type ="text/javascript"> 
	function condition() { 
		document.form.submit.disabled=(!((document.form.name.value.length > 3) && (document.form.password.value.length > 3)));
	} 
	condition(); 
</script>

</body>
</html>