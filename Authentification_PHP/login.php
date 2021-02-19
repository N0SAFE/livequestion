<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        
        <?php
			// Permet d'appeler la fonction de connexion à la BD
            require('connexion.php');
			
			// Démarrage d'une session
            session_start();

            // Connexion à la BD
            $co = connexionBdd();

            if (isset($_POST['submit'])){
                $pseudo = $_POST['pseudo'];
				$password = hash('sha256', $_POST['password']);

                // Préparation de la requête
                $query = $co->prepare('SELECT * FROM utilisateurs WHERE pseudo_uti=:login and mot_de_passe_uti=:pass');

                // Association des paramètres aux variables/valeurs
                $query->bindParam(':login', $username);
				$query->bindParam(':pass', $password);

                // Execution de la requête
                $query->execute();    

                // Récupération dans la variable $result de toutes les lignes que retourne la requête
                $result = $query->fetchall();

                // On compte le nombre de lignes résultats de la requête
                $rows = $query->rowCount();
				
				// Si une ligne résultat est trouvée, cela signifi que l'utilisateur existe dans la BD
				// et donc qu'il a le droit de se connecter
                if($rows==1){
					// On définit la variable de session username avec la valeur saisie par l'utilisateur
                    $_SESSION['pseudo'] = $pseudo;
					// On lance la page index.php à la place de la page actuelle
                    header("Location: index.php");
                }else{
					// Si la requête ne retourne rien, alors l'utilisateur n'existe pas dans la BD, on lui
					// affiche un message d'erreur
                    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                }
            }
        ?>
        
        <form class="box" action="" method="post" name="login">
            <h1 class="box-title">Connexion</h1>
            <input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
            <p class="box-register">Vous êtes nouveau ici ? <a href="register.php">S'inscrire</a></p>
            <?php if (! empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
        </form>
    </body>
</html>