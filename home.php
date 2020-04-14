<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	try{
		$sql = 'SELECT `f`.*, `g`.`rol`, g.voornaam, g.achternaam, g.email FROM `fotos` f LEFT JOIN `gebruikers` g ON `g`.`id` = `f`.`gebruiker_id` ORDER BY `f`.`datum` DESC';
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
	<title>Zona | Home</title>
	<script src="https://kit.fontawesome.com/16946e2d22.js" crossorigin="anonymous"></script>
	</head>

	<body class="post-body">
		<nav>
			<h1>zona</h1>
			<a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>">
				<div class="profile-menu">
					<p><?php echo $voornaam ?></p><img src="icon/user.svg" class="user-photo-small">
				</div>
			</a>
		</nav>
		<main class="main-home-desktop">

			<?php foreach($dbname as $post): ?>
			<div class="post">

				<p class="author">
				<?php

					//Als de 'gebruiker_id' gelijk is aan de ingelogde gebruiker's id:
					if($post['gebruiker_id'] === $_SESSION['user_id']){
						//dan ga je naar je eigen profiel.
						echo '<a href="profile.php">' . $post['voornaam'] . ' ' . $post['achternaam'] . '</a>';
					} else {
						//anders ga je naar het profiel van een andere gebruiker.
						echo '<a href="user.php?id=' . $post['gebruiker_id'] . '">' . $post['voornaam'] . ' ' . $post['achternaam'] . '</a>';
					}

				?>
				</p>

				<p class="author post-title"><?php echo $post['titel'] ?></p>
				<img src="uploads/<?php echo $post['bestand'] ?>" id="roll-over">
				<p class="description"><?php echo $post['omschrijving'] ?></p>
			</div>
			<?php endforeach ?>

		</main>
		<?php include 'incl/footer.incl.php'; ?>