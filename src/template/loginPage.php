<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style type="text/css">
		body {
			background-color: #DADADA;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 450px;
		}
	</style>
	<script src="js/jquery.js"></script>
	<script src="semantic/semantic.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.ui.form').form({
				fields: {
					username: {
						identifier : 'username',
						rules: [
							{
								type : 'empty'
							}
						]
					},
					password: {
						identifier : 'password',
						rules: [
							{
								type : 'empty'
							}
						]
					},

				}
			})
			.form('set values', {
				username: '<?php echo $_POST['username']; ?>'
			});
		});
	</script>
</head>
<body cz-shortcut-listen="true">
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<div class="content">
					Log-in to your account
				</div>
			</h2>
			<form class="ui large form error" method="POST">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="username" placeholder="Username">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="ui fluid large teal submit button">Login</div>
					<div class="ui error message"><?php 
						if($errors){
							echo "<div class='list'>";
						}
						foreach ($errors as $value) {
							echo "<li>".$value."</li>";
						}
						if($errors){
							echo "</div>";
						}

						?></div>

				</div>
			</form>
		</div>
	</div>

</body>
</html>