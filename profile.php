<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	try{
		$sql = 'SELECT * FROM `fotos` WHERE `gebruiker_id` = :gebruiker_id ORDER BY `fotos`.`datum` DESC';

		$statement = $connection->prepare($sql);

		$data = [
			'gebruiker_id' => $_SESSION['user_id']
		];

		$statement->execute($data);
		$dbname = $statement->fetchAll();
	} catch(\PDOException $e){
		echo $e->getMessage();
		exit();
	}

	$voornaam = $_SESSION['voornaam'];
	$achternaam = $_SESSION['achternaam'];

?>

	<title>Zona | <?php echo $voornaam . ' ' . $achternaam ?></title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.css">
	<script src="https://kit.fontawesome.com/16946e2d22.js" crossorigin="anonymous"></script>
	</head>
	<body>

		<!-- HIDDEN MENU -->
		<input type="checkbox" id="menuSwitcher" checked>
		<div class="nav2">
			<label for="menuSwitcher" class="haal-menu">
				<i class="fas fa-times close-button"></i>
			</label>
			<ul>
				<a href="logout.php"><li>logout</li></a>
				<a href="settings.php?id=<?php echo $_SESSION['user_id'] ?>"><li>settings</li></a>
				<!-- <a href="#"><li>vis</li></a> -->
			</ul>
		</div>

		<!-- PROFILE NAV -->
		<nav class="profile-nav">
			<a href="home.php" class="back-button">
				<img src="icon/back-icon.svg" height="25px" width="25px">
			</a>
			<h1><?php echo $voornaam . ' ' . $achternaam ?></h1>
			<label for="menuSwitcher" class="haal-menu">
				<i class="fas fa-bars"></i>
			</label>
		</nav>

		<!-- GALLERY -->
		<main class="profile-main">
			<div class="profile-main-div">
				<!-- POST -->
				<?php foreach($dbname as $ppost): ?>
					<!-- THUMBNAIL -->
					<div class="profile-post">
						<img src="uploads/<?php echo $ppost['bestand'] ?>">
					</div>
					<!-- FULL POST -->
					<div class="read-more">
						<p><?php echo $ppost['titel'] ?></p>
						<img src="uploads/<?php echo $ppost['bestand'] ?>" class="modaal-img">
						<p class="edit-post"><a href="edit.php?id=<?php echo $ppost['id'] ?>">edit</a></p>
						<p class="description"><?php echo $ppost['omschrijving'] ?></p>
					</div>
				<?php endforeach ?>
			</div>
		</main>

		<section class="upload-section">
			<a href="upload.php"><img src="icon/upload.svg" width="40px" height="40px"></a>
		</section>
		
		<script src="script/lightbox.js"></script>
	</body>
</html>