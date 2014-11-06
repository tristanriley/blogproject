<?php
	$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);//saves input from title in a variable and filters the string
	$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);//saves input from post in a variableand filters the string

	echo "<p>Title: $title</p>";//echos out title that was submited
	echo "<p>Post: $post</p>";//echos out post that was submited