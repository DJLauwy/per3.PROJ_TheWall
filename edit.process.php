<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();
	
	$id = (int)$_GET['id'];
	$titel = $_POST['titel'];
	$omschrijving = $_POST['omschrijving'];

	$sql = 'UPDATE `fotos` SET
		`titel` = :titel,
		`omschrijving` = :omschrijving 
		WHERE `id` = :id';

	$stmt = $connection->prepare($sql);

	$data = [
		'id' => $id,
		'titel' => $titel,
		'omschrijving' => $omschrijving,
	];

	$stmt->execute($data);

?>
	<title>Zona | Edit post</title>
	</head>
	<body>
		<h1 class="announcement">edit complete</h1>
		<p id="return-button"><a href="profile.php">return to your profile</a></p>
	</body>
</html>