<?php
	
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';
	logInCheck();

	$id = (int)$_GET['id'];

	$sql = 'SELECT * FROM `fotos` WHERE `id` = :id';

	$statement = $connection->prepare($sql);

	$data = [
		'id' => $id
	];

	$statement->execute($data);
	$post = $statement->fetch();

?>

	<title>Zona | Edit post</title>
	</head>

	<body>

		<nav class="profile-nav">
			<a href="profile.php" class="back-button">
				<img src="icon/back-icon.svg" height="25px" width="25px">
			</a>
		</nav>

		<main class="upload-page">

			<h1>edit</h1>

			<form action="edit.process.php?id=<?php echo $_GET['id'] ?>" method="post">
				<input type="text" name="titel" value="<?php echo $post['titel'] ?>" placeholder="title">
				<!-- <textarea rows="4" cols="50" name="omschrijving" value="<?php echo $post['omschrijving'] ?>" placeholder="put a description here"></textarea> -->
				<input type="text" name="omschrijving" value="<?php echo $post['omschrijving'] ?>" placeholder="put a description here">
				<input type="submit" value="send" name="photofile" id="upload-button">
			</form>

			<img src="uploads/<?php echo $post['bestand'] ?>" class="photo-edit-page">

			<a href="delete.php?id=<?php echo $_GET['id'] ?>" id="delete-link"><p id="delete-button">delete photo</p></a>

		</main>
	</body>
</html>