<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
 ?>
	<title>Zona | Account created</title>		
	<?php

		$rol = 0;
		$voornaam = $_POST["voornaam"];
		$achternaam = $_POST["achternaam"];
		$wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);
		$email = $_POST["email"];

		$stmt = $connection->prepare("INSERT INTO gebruikers (rol, voornaam, achternaam, wachtwoord, email) VALUES (:rol, :voornaam, :achternaam, :wachtwoord, :email)");
		$stmt->bindParam(':rol', $rol);
		$stmt->bindParam(':voornaam', $voornaam);
		$stmt->bindParam(':achternaam', $achternaam);
		$stmt->bindParam(':wachtwoord', $wachtwoord);
		$stmt->bindParam(':email', $email);

		$stmt->execute();

	?>

	</head>
	<body>
		<section class="start-logo">
			<h1 class="action-title">your account has been created</h1>
		</section>
		<section class="start-logo">
			<a href="home.php"><input type="button" value="start exploring" class="login-button register-button"></a>
		</section>
	</body>