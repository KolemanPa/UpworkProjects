<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Welcome to my website!</h2>
	<p>You are logged in!</p>
	<div>
		<p>
			This is a test
		</p>
	</div>

	<p>
		You are logged out!
	</p>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
    <p> <?php echo $_SERVER["SCRIPT_NAME"]?></p>
</div>

<?php include("includes/footer.php");?>

</body>
</html>
