		<?php
			require_once(__DIR__ . "/controller/login-verify.php");
			//accesses header.php's contents
			require_once(__DIR__ . "/view/header.php");  
			//only displays the nav if the authenticateUser function runs treu
			if (authenticateUser()) {
			//accesses navigation.php's contents
			require_once(__DIR__ . "/view/navigation.php");

			}
			//accesses create-db.php's contents
			require_once(__DIR__ . "/controller/create-db.php");  
			//accesses footer.php's contents
			require_once(__DIR__ . "/view/footer.php");  
			//displays posted posts on index page
			require_once(__DIR__ . "/controller/read-posts.php");
		?>

		
	

