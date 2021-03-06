<?php
	//allows navigation.php to acces config.php
	require_once(__DIR__ . "/../model/config.php"); 
	require_once(__DIR__ . "/../controller/login-verify.php");
	//runs if the user hasn't logged in correctly
	if (!authenticateUser()) {
		//sends the user back to the home
		header("Location: " . $path . "home.php");
		//stops the page from loading
		die();
	}
?>
<nav>
	<ul>
		<!-- links the config file to the home page -->
		<button type="button" class="btn btn-default btn-lg">
			<a href="<?php echo $path . "post.php"?>"> Back to Blog Post</a>
		</button>
	</ul>

</nav>