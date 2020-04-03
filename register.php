<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
 ?>
	<title>Zona | Register</title>
	
	</head>
	<body>
		<nav class="back">
			<a href="index.php" class="back-button">
				<img src="icon/back-icon.svg" height="25px" width="25px">
				<p>back</p>
			</a>
		</nav>
		<section class="register-logo">
			<h1>register</h1>
		</section>
		<section class="register">
			<form action="register.process.php" method="post">
				<input type="text" placeholder="first name" name="voornaam" required>
				<input type="text" placeholder="surname" name="achternaam" required>
				<input type="password" placeholder="password" name="wachtwoord" required>
				<!-- Wachtwoord bevestigen komt nog! -->
				<!-- <input type="password" placeholder="confirm password"> -->
				<input type="text" placeholder="email" name="email" required>
				<span><input type="checkbox" id="voorwaarden" required><p id="font">i have read and  agree to <a href="faq.php">zona's terms of service and privacy policy</a></p></span>
				<input type="submit" value="register" id="send-button">
			</form>
		</section>
	</body>
</html>