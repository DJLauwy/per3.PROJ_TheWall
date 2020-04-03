<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	$id = (int)$_GET['id'];
	$voornaam = $_POST['voornaam'];
	$achternaam = $_POST['achternaam'];

	$sql = 'UPDATE `gebruikers` SET
		`voornaam` = :voornaam,
		`achternaam` = :achternaam 
		WHERE `id` = :id';

	$stmt = $connection->prepare($sql);

	$data = [
		'id' => $id,
		'voornaam' => $voornaam,
		'achternaam' => $achternaam,
	];

	$stmt->execute($data);

	?>
	<title>Zona | Saved changes</title>
	</head>
	<body>
		<h1 class="announcement">saved changes</h1>
		<p id="return-button"><a href="profile.php">return to your profile</a></p>
	</body>
</html>