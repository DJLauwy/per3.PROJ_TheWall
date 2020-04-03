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
?>

	<title>Zona | Delete post</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	</head>
	<body>

		<nav class="profile-nav">
			<a href="profile.php">
				<img src="icon/back-icon.svg" height="25px" width="25px">
			</a>
		</nav>

		<h1 class="announcement">are you sure you want to delete this post?</h1>
		<p id="return-button"><a href="delete.process.php?id=<?php echo $_GET['id'] ?>">yes, i am sure</a></p>
	</body>
</html>