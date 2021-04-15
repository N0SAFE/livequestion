<?php
	// Récupération des données de la session
	session_start();

	// Vérifie si l'utilisateur est connecté, sinon redirection vers la page de connexion
	if(!isset($_SESSION["pseudo"])){
		header("Location: login.php");
		exit(); 
	}
	
?>
<!DOCTYPE html>
<html>
<script>header("Cache-Control: no-cache, must-revalidate");</script>
<head>
    <?php $title = 'livequestion'; ?>
    <?php $up = '../'; ?>
    <?php require('../Authentification_PHP/connexion.php'); ?>
    <?php include('../include/head.php'); ?>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<!-- <script>showDiv1();</script> -->
    <header>
    <div style="position: absolute; left: 50%;" class="test">
        <div class="sucess padding-right-20 padding-left-20" data-aos="fade-down">
            <h1>Bienvenue <?php echo $_SESSION['pseudo']; ?> !</h1>
        </div>
    </div>
    <?php include("../include/navbar.php");?>
    </header>
    
    <!-- Modal -->
    <div class="modal fade" id="ModalQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Poser votre question</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="formQuestion">
                        <label for="TitreQuestion">Titre de la question: </label>
                        <input type="text" name="TitreQuestion" required>
                        <label for="CatQuestion">Catégorie de la question: (1 categorie par question!!) </label>
                        <select>
                            <?php
        		$co = connexionBdd();
        		$query = $co->prepare("SELECT * FROM categorie");
        		$query->execute();
       

        		while ($result2 = $query->fetch()){
        		    echo '<option value="' . $result2['id'] . '">' . $result2['nom_cat'] . '</option>';  
        		} 
                
        		?>

                        </select><br>
                        <input type="submit" name="submit" value="Poser la question">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="echoQuestion">
        <?php 
	$co = connexionBdd();
    $query = $co->prepare("SELECT * FROM question");
    $query->execute();
    $result = $query->fetchAll();
    // On affiche chaque entrée
                    echo '<h3>Question :</h3>
                    <table border="1" bordercolor="#ff0000">
                        <tr>
                            <th>Pseudo</th>
                            <th>Question</th>
                            <th>Categorie</th>
                            <th>Date question</th>
                           
                        </tr>';
                        while ($donnees = $query->fetch())
                        {
                        echo'<tr>
                                <td>' . $donnees[0] . '</td>
                                <td>' . $donnees[1] . '</td>
                                <td>' . $donnees[2] .'</td>
                                <td>' . $donnees[3] . '</td>
                                
                            </tr>';
                        }
                echo'</table>'; ?>
        <!-- faire apparaitre les question posé stocker dans la bdd -->
    </div>
    <?php include('../include/script.php');?>
    <div class="question center-80-percent">
        <div class="profile">
            <p>(img profile) (nom profile) (date de post) (tag)</p>
        </div>
        <div class="container bg-white">
        <div class="titre">
            <h1>
            titre
            </h1>
        </div>
        <div class="content">
            content
        </div>
        </div>
    </div>
</body>

</html>