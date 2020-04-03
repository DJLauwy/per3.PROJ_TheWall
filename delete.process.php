<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	if(empty($_GET['id'])){
		echo 'This is no id!';
		exit;
	}

	$id = (int)$_GET['id'];

	$data = [
		'id' => $id,
	];

	$sql = 'DELETE FROM `fotos` WHERE `id` = :id';

	$stmt = $connection->prepare($sql);

	$stmt->execute($data);
?>
		<title>Zona | Post deleted</title>
	</head>
		<body>
		<h1 class="announcement">post deleted</h1>
		<p id="return-button"><a href="profile.php">return to your profile</a></p>
	</body>
</html>