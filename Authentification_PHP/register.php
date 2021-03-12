<!DOCTYPE html>
<html>
    <head>
		<?php $title = 'insciption'; ?>
        <?php $up = '../'; ?>
        <?php include('../include/head.php'); ?>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>

        <?php
			// Permet d'appeler la fonction de connexion à la BD
            require('connexion.php');
		
			// Cas où le formulaire est validé
			if (isset($_POST['submit'])){
				// Tests si les 3 champs ont été remplis
				if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['password'],  $_POST['password2'],  $_POST['choixgenre'])){	
					// Récupèration les 4 saisies du formulaire
					$pseudo = $_POST['pseudo'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$choixgenre = $_POST['choixgenre'];
					
					// Connexion à la BD
					$co = connexionBdd();

					// Préparation de la requête
					$query = $co->prepare("INSERT into utilisateurs (pseudo_uti, email_uti, mot_de_passe_uti, genre_uti) VALUES (:pseudo, :email, :password, :choixgenre)");

					// Association des paramètres aux variables/valeurs
					$query->bindParam(':pseudo', $pseudo);
					$query->bindParam(':email', $email);
					$query->bindParam(':password', $password);
					$query->bindParam(':choixgenre', $choixgenre);

					// Exécution de la requête
					$query->execute();
					
					// Message de succès si l'insertion est réalisée
					if ($query) {
						echo "<div class='sucess'>
								<h3>Vous êtes inscrit avec succès.</h3>
								<p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
							 </div>";
					}
				}
			// Cas où le formulaire n'a pas encore été validé
			}else{
			?><?php include('../include/navbar.php'); ?>
					<form class="box" action="" method="post">
						<h1 class="box-title">S'inscrire</h1>
						<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur" required />
						<input type="text" class="box-input" name="email" placeholder="Email" required />
						<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
						<input type="password" class="box-input" name="password2" placeholder="Mot de passe (confirmation) " required />
						<div class="center-80-percent">
						<input type="radio" class="register_radio" name="choixgenre" value="H">
   						<label >Homme</label>
   						<input type="radio"  class="register_radio"  name="choixgenre" value="F">
    					<label >Femme</label>
    					<input type="radio"  class="register_radio"  name="choixgenre" value="N">
    					<label >Non genré</label>
						</div>
						<button type="submit" name="submit" class="btn btn-primary box-button">S'inscrire</button>
						<p class="box-register">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
					</form>
			<?php
			}
			?>
    </body>
</html>