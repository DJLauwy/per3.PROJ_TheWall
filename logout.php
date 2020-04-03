<?php
	require 'incl/config.incl.php';
	require 'incl/head.incl.php';
	require 'incl/login.status.php';

	session_start();
	echo '<p>logging out...</p>';
	session_destroy();
	header('Location: index.php');
?>