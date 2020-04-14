<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	$id = (int)$_GET['id'];

	$sql = 'SELECT * FROM `gebruikers` WHERE `id` = :id';

	$statement = $connection->prepare($sql);

	$data = [
		'id' => $_SESSION['user_id']
	];

	$statement->execute($data);
	$account = $statement->fetch();

	$voornaam = $_SESSION['voornaam'];
	$achternaam = $_SESSION['achternaam'];

?>

	<title>Zona | Settings</title>

	</head>

	<body>
		<!-- NAV -->
		<nav class="back">
			<a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>" class="back-button">
				<img src="icon/back-icon.svg" height="25px" width="25px">
				<p>back</p>
			</a>
		</nav>

		<!-- SETTING CONTAINER -->
		<section class="settings">
			
			<div class="profile-settings deel1">
				<h1><?php echo $voornaam . ' ' . $achternaam ?></h1>
				<h2>current email:</h2>
				<h3 id="show-email"><?php echo $account['email'] ?></h3>
			</div>

			<div class="profile-settings deel2">
				<h2>change profile</h2>
				<form action="settings.process.php?id=<?php echo $_GET['id'] ?>" method="post">
					<input type="text" value="<?php echo $voornaam ?>" placeholder="first name" name="voornaam" required>
					<input type="text" value="<?php echo $achternaam ?>" placeholder="surname" name="achternaam" required>
					<input type="submit" value="save changes" id="save-button">
				</form>
			</div>

		</section>

	</body>

</html>