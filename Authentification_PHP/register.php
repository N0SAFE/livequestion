<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" href="style.css" />
    </head>
    <body>

        <?php
			// Permet d'appeler la fonction de connexion à la BD
            require('connexion.php');
		
			// Cas où le formulaire est validé
			if (isset($_POST['submit'])){
				// Tests si les 3 champs ont été remplis
				if (isset($_POST['username'], $_POST['email'], $_POST['password'])){	
					// Récupèration les 3 saisies du formulaire
					$username = $_POST['username'];
					$email = $_POST['email'];
					$password = hash('sha256', $_POST['password']);
					
					// Connexion à la BD
					$co = connexionBdd();

					// Préparation de la requête
					$query = $co->prepare("INSERT into users (username, email, password) VALUES (:username, :email, :password)");

					// Association des paramètres aux variables/valeurs
					$query->bindParam(':username', $username);
					$query->bindParam(':email', $email);
					$query->bindParam(':password', $password);

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
			?>
					<form class="box" action="" method="post">
						<h1 class="box-title">S'inscrire</h1>
						<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
						<input type="text" class="box-input" name="email" placeholder="Email" required />
						<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
						<input type="submit" name="submit" value="S'inscrire" class="box-button" />
						<p class="box-register">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
					</form>
			<?php
			}
			?>
    </body>
</html>