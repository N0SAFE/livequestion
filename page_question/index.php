<?php
	// Récupération des données de la session
	session_start();

	// Vérifie si l'utilisateur est connecté, sinon redirection vers la page de connexion
	if(!isset($_SESSION["pseudo"])){
		header("Location: ../Authentification_PHP/login.php");
		exit(); 
	}
	
?>
<!DOCTYPE html>
<html>
<script>
header("Cache-Control: no-cache, must-revalidate");
</script>

<head>
    <?php $title = 'livequestion'; ?>
    <?php $up = '../'; ?>
    <?php require('../Authentification_PHP/connexion.php'); ?>
    <?php include('../include/head.php'); ?>
    <link rel="stylesheet" href="style.css" />
</head>
<!-- php pour modifier le nom d'utilisateur  -->
<?php
    if (isset($_POST["submitModif"])) {
        $modifyUsername = $_POST["modifyUsername"];
        $_SESSION['pseudo'] = $_POST["modifyUsername"];
        $co = connexionBdd();
        $query = $co->prepare("UPDATE utilisateurs SET pseudo_uti = :modifyUsername WHERE  id = :id ");
        $query->bindParam(":modifyUsername", $modifyUsername);
        $query->bindParam(":id", $_SESSION['id'][0][0]);
        $query->execute();
        header('location: index.php');
    }
    if (isset($_POST["submitPoserQueasion"], $_POST["categorie"], $_POST["TitreQuestion"])) {
        $categorie = $_POST["categorie"];
        $TitreQuestion = $_POST["TitreQuestion"];
        $co = connexionBdd();
        $query = $co->prepare("INSERT INTO question (titre_quest, cat_id, auteur_id) VALUES (:TitreQuestion, :categorie, :id)");
        $query->bindParam(":TitreQuestion", $TitreQuestion);
        $query->bindParam(":categorie", $categorie);
        $query->bindParam(":id", $_SESSION['id'][0][0]);
        $query->execute();
        header('location: index.php');
    }
function ModalProfil(){
?>
    <!-- Modal -->
    <div class="modal fade" id="modifProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bienvenue sur votre profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3><?php echo $_SESSION['pseudo']; ?></h3>
                    <br>
                    <form method="post">
                        <input name="id" type="hidden" value="<?php  ?>">
                        <label for="modifyUsername">Changer votre nom d'utilisateur :</label>
                        <input type="text" name="modifyUsername" required="">
                        <input type="submit" name="submitModif" value="Confirmer le changement">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<body>
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
                    <form method="post">
                        <label for="TitreQuestion">Titre de la question: </label>
                        <input type="text" name="TitreQuestion" required>
                        <label for="CatQuestion">Catégorie de la question: (1 categorie par question!!) </label>
                        <select required name="categorie">
                            <option value="">--- choisissez une categorie</option>
                            <?php
        		$co = connexionBdd();
        		$query = $co->prepare("SELECT * FROM categorie");
        		$query->execute();
       

        		while ($result2 = $query->fetch()){
        		    echo '<option value="' . $result2['id'] . '">' . $result2['nom_cat'] . '</option>';  
        		} 
        		?>

                        </select><br>
                        <button type="submit" name="submitPoserQueasion"> poser la question </button>

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
    <div class="question center-80-percent">

        <div class="container bg-white">
            <div class="profile">
                <p>(img profile) (nom profile) (date de post) (tag)</p>
            </div>
            <div class="titre">
                <h1>
                    titre
                </h1>
            </div>
            <!--  <div class="content">
            content
        </div> -->
        </div>
    </div>
    <!-- modal pour modifier le nom d'utilisateur a mettre en forme avec du css -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifProfil"> Profil </button>
    <?php ModalProfil(); ?>
    <?php include('../include/script.php');?>
</body>

</html>