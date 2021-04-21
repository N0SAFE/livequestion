<!DOCTYPE html>
<html>
<head>
    <?php $title = 'insciption'; ?>
	<?php $up = '../'; ?>
	<?php $errorPass = False;?>
    <?php include('../include/head.php'); ?>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<?php 
function check_email_address($email) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
} 
function form($errorPass=False, $errorEmail=False, $existEmail=False, $existPseudo=False, $mdpToLow=False){
	$up = '../'; ?>
	<header>
        <?php include('../include/navbar.php'); ?>
    </header>
	<?php if ($mdpToLow==True){?>
		<div class="login-box margin-top-20">
	<?php }else{?>
    	<div class="login-box">
	<?php }?>
        <h2>Login</h2>
        <form class="box" action="" method="post">
            <div class="user-box">
                <input type="text" name="pseudo" required="">
                <label>Username</label>
            </div>
			<?php if ($existPseudo==True){?>
				<p style="position:absolute; margin-top:-20px; margin-left: 170px; color:red;">pseudo already exist</p>
			<?php }?>
            <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
            </div>
			<?php if ($existEmail==True){?>
				<p style="position:absolute; margin-top:-20px; margin-left: 170px; color:red;">email already exist</p>
			<?php }?>
			<?php if ($errorEmail==True){?>
				<p style="position:absolute; margin-top:-20px; margin-left: 170px; color:red;">email incorect</p>
			<?php }?>
            <div class="user-box">
                <input type="password" minlength="8" name="password" required="">
                <label>Password</label>
            </div>
			<?php if ($errorPass==True){?>
				<p style="position:absolute; margin-top:-20px; margin-left: 170px; color:red;">verification incorect</p>
			<?php }?>
            <div class="user-box">
                <input type="password" name="password2" required="">
                <label>Password (confirmation)</label>
            </div>
			<?php if ($mdpToLow==True){?>
				<p style="position:relative; margin-top:-20px; margin-left: 100px; color:red;">le mot de passe est trop faible</p>
			<?php }?>
            <div class="center-80-percent">
                <input type="radio" class="register_radio" name="choixgenre" value="H">
                <label>Homme</label>
                <input type="radio" class="register_radio" name="choixgenre" value="F">
                <label>Femme</label>
                <input type="radio" class="register_radio" name="choixgenre" value="N">
                <label>Non genré</label>
            </div>
            <button href="#" name="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                S'inscrire
            </button>
        </form>
        <div class="container margin-top-20">
            <p class="box-register">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
        </div>
    </div>
	<?php
}
?>
    <?php
		// Permet d'appeler la fonction de connexion à la BD
    	require('connexion.php');
		
		// Cas où le formulaire est validé
		if (isset($_POST['submit'])){
			// Tests si les 3 champs ont été remplis
			if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'],  $_POST['password2'],  $_POST['choixgenre'])){	
				// Récupèration les 4 saisies du formulaire
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$choixgenre = $_POST['choixgenre'];
				if(preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$#', $_POST['password']) AND (strlen($_POST['password']) >= 8)){
					if ($_POST['password'] == $_POST['password2']){
						if (check_email_address($_POST['email']) == True){

							// Connexion à la BD
							$co = connexionBdd();
							$query = $co->prepare("SELECT * From utilisateurs where email_uti = :email");
							// Préparation de la requête
							$query->bindParam(':email', $email);
							$query->execute();
							$result = $query->fetchall();
							if (empty($result) == 1){
								$query = $co->prepare("SELECT * From utilisateurs where pseudo_uti = :pseudo");
								// Préparation de la requête
								$query->bindParam(':pseudo', $pseudo);
								$query->execute();
								$result = $query->fetchall();
								if (empty($result) == 1){
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
										echo "<div class='sucess center-500-px'>
												<h3 style='text-align: center; color:white;'>Vous êtes inscrit avec succès.</h3>
												<p style='text-align: center; color:white;'>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
											</div>";
									}
								}
								else{
									form(False, False, False, True);
								}
							}
							else{
								form(False, False, True);
							}
						}
						else{
							form(False, True);
						}
					}
					else{
						form(True);
					}
				}else{
					form(False, False, False, False, True);
				}
			}
			// Cas où le formulaire n'a pas encore été validé
		}else{
				form();
			}
			?>
    <?php include('../include/script.php');?>
</body>

</html>