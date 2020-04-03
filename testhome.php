<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	try{
		$sql = 'SELECT * FROM `fotos`, `gebruikers` WHERE `gebruiker_id` = :gebruiker_id';
		$statement = $connection->prepare($sql);

		$data = [
			'gebruiker_id' => $_SESSION['user_id']
		];

		$statement->execute($data);
	} catch(\PDOException $e){
		echo $e->getMessage();
		exit();
	}

	$voornaam = $_SESSION['voornaam'];

 ?>
	<title>Zona | TEST</title>
	
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
		<main>
			
			<?php //if id !== gebruiker_id then don't show ?>

			<?php
				//if(dit !== dit){
				//	hide();
				//}else{ 
					foreach($statement as $post){
					echo '<div class="post">';
						echo '<p class="author">' . $post['voornaam'] . '</p>';
						echo '<p class="author post-title">' . $post['titel'] . '</p>';
						echo '<img src="uploads/' . $post['bestand'] . '">';
						echo '<p class="description">' . $post['omschrijving'] .'</p>';
					echo '</div>';
					}
				//}
			?>

		</main>
		<?php include 'incl/footer.incl.php'; ?>