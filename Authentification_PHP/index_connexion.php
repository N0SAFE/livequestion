<?php
	// Récupération des données de la session
	session_start();

	// Vérifie si l'utilisateur est connecté, sinon redirection vers la page de connexion
	if(!isset($_SESSION["pseudo"])){
		header("Location: login.php");
		exit(); 
	}
	
?>
 <?php $title = 'livequestion'; ?>
 <?php $up = '../'; ?>
<!DOCTYPE html>

<html>
	<head>

	 <?php include('../include/head.php'); ?>
	   <link rel="stylesheet" href="style_connecter.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?> !</h1>
		<p>C'est votre tableau de bord.</p>
		<a href="logout.php">Déconnexion</a>
		</div>
	</body>
</html>