<!DOCTYPE html>
<html>

<head>
    <?php $title = 'connexion'; ?>
    <?php $up = '../'; ?>
    <?php include('../include/head.php'); ?>
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
				$password =  $_POST['password'];

                // Préparation de la requête
                $query = $co->prepare('SELECT id FROM utilisateurs WHERE pseudo_uti=:login and mot_de_passe_uti=:pass');

                // Association des paramètres aux variables/valeurs
                $query->bindParam(':login', $pseudo);
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
					// On définit la variable de session username avec la valeur saisie par l'utilisateur et id avec l'id qui lui est attribuer
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['id'] = $result;
					// On lance la page index.php à la place de la page actuelle
                    header("Location: ../page_question/index.php");
                }else{
					// Si la requête ne retourne rien, alors l'utilisateur n'existe pas dans la BD, on lui
					// affiche un message d'erreur
                    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                }
            }
        ?>
    <header>
        <?php include('../include/navbar.php'); ?>
    </header>
    <div class="login-box">
        <h2>Login</h2>
        <form class="box" action="" method="post" name="login">
            <div class="user-box">
                <input type="text" name="pseudo" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <button href="#" name="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Connexion
        </button>
        </form>
        <div class="container margin-top-20">
        <p class="box-register">Vous êtes nouveau ici ? <a href="register.php">S'inscrire</a></p>
        <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
        </div>
    </div>
    <?php include('../include/script.php'); ?>
</body>

</html>