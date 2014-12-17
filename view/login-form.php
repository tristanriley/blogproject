<?php
	require_once(__DIR__ ."/../model/config.php");
?>

<h1>Login</h1>
<!-- creates the login page to sign in -->
<form method="post" action="<?php echo $path . "controller/login-user.php" ?>">
	<div>
		<!-- input box for username  -->
		<label for="username">Username: </label>
		<input type="text" name="username" />
	</div>
	<div>
		<!-- input box for password -->
		<label for="password">Password: </label>
		<input type="password" name="password"/>
	</div>
	<div>
		<!-- button to submit input  -->
		<button type="submit">Submit</button>
	</div>
</form>