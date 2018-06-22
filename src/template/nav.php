<nav class="ui fixed inverted menu">
	<div class="ui container">
		<a href="index.php" class="header item">Home</a>
		<a href="text.php" class="item">Text</a>
		<a href="images.php" class="item">Image</a>
		<div class="right menu">
			<!-- <a target="_blank" href="../" class="header item">See website</a> -->
			<a class="ui item">Hello <?php echo $_SESSION['userName']; ?></a>
			<a class="ui item" href="logout.php">Logout</a>
		</div>
	</div>
</nav>