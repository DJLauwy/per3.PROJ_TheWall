<?php
	function logInCheck(){
		if(!isLoggedIn()){
			header('Location: ../login.php');
		}
	}
	function isLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return true;
		}
		return false;
	}
?>