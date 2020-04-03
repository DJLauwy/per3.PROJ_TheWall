<?php 
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';

	try{
		$query = "SELECT * FROM fotos";
		$statement = $connection->query($query);
	} catch (PDOException $e){
		echo 'Fout bij SQL query:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
	}

 ?>
	<title>Zona | Upload</title>
	</head>
	<body>
		<nav class="profile-nav">
			<a href="profile.php">
				<img src="icon/back-icon.svg" height="25px" width="25px">
			</a>
		</nav>
		<main class="upload-page">
			<h1>upload</h1>
			<form action="upload.process.php" enctype="multipart/form-data" method="post">
				<input type="text" name="titel" placeholder="title" required>
				<textarea rows="4" cols="50" name="omschrijving" placeholder="put a description here"></textarea>
				<input type="file" name="bestand" accept="image/*" required><br><br>
				<input type="submit" value="upload" name="photofile" id="upload-button">
			</form>
		</main>
	</body>
</html>