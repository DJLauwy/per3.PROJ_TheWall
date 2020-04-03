<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';

	session_destroy();

 ?>
	<title>Zona | Login</title>
	
	</head>
	<body>
		<nav class="back">
			<a href="index.php" class="back-button">
				<img src="icon/back-icon.svg" height="25px" width="25px">
				<p>back</p>
			</a>
		</nav>

		<section class="login-logo">
			<h1>welcome back</h1>
			<h2>login with your email to get back up and running</h2>
		</section>

		<section class="register">
			<form action="login.process.php" method="post">
				<input type="text" placeholder="email" name="email">
				<input type="password" placeholder="password" name="wachtwoord">
				<input type="submit" value="login" id="send-button">
			</form>
		</section> 

	</body>
</html>