<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
 ?>
	<title>Zona | Uploading</title>
	</head>
	<body>
		<?php

			$titel = $_POST['titel'];
			$omschrijving = $_POST['omschrijving'];
			$bestand = basename($_FILES['bestand']['name']);
			$datum = date('Y-m-d H:i:s');
			$gebruiker_id = $_SESSION['user_id'];

			$stmt = $connection->prepare("INSERT INTO fotos (titel, omschrijving, bestand, datum, gebruiker_id) VALUES (:titel, :omschrijving, :bestand, :datum, :gebruiker_id)");
			$stmt->bindParam(':titel', $titel);
			$stmt->bindParam(':omschrijving', $omschrijving);
			$stmt->bindParam(':bestand', $bestand);
			$stmt->bindParam(':datum', $datum);
			$stmt->bindParam(':gebruiker_id', $gebruiker_id);

			$stmt->execute();

			$map = 'uploads/';

			$upload = $map . basename($_FILES['bestand']['name']);
			if(move_uploaded_file($_FILES['bestand']['tmp_name'], $upload)){
				?>
				<h1 class="announcement">photo uploaded</h1>
				<p id="return-button"><a href="profile.php">return to your profile</a></p>
				<?php
			}else{
				?>
				<h1 class="announcement">something went wrong</h1>
				<p id="return-button"><a href="upload.php">try again</a></p>
				<?php
			}
		?>
	</body>
</html>