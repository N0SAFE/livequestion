<?php
	// Récupération des données de la session
	session_start();

	// Vérifie si l'utilisateur est connecté, sinon redirection vers la page de connexion
	if(!isset($_SESSION["all"][0]['pseudo_uti'])){
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
    <?php $error['uploadFile'] = False; ?>
    <?php $title = 'livequestion'; ?>
    <?php $up = '../'; ?>
    <?php require('../Authentification_PHP/connexion.php'); ?>
    <?php include('../include/head.php'); ?>
    <link rel="stylesheet" href="style.css" />
</head>
<!-- php pour modifier le nom d'utilisateur  -->
<?php
function check_email_address($email) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
}
    $error['user'] = "";
    $error['email'] = "";
    $error['password'] = "";
    if (isset($_SESSION['error']['user exist'])) {
        $error['user'] = "<p style='color:red;'>cette utilisateur existe deja</p>";
        unset($_SESSION['error']['user exist']);
    }
    if (isset($_SESSION['error']['email exist'])) {
        $error['email'] = "<p style='color:red;'>cette email existe deja</p>";
        unset($_SESSION['error']['email exist']);
    }
    if (isset($_SESSION['error']['incorrect email'])) {
        $error['email'] = "<p style='color:red;'>l'email est incorrect</p>";
        unset($_SESSION['error']['incorrect email']);
    }
    if (isset($_SESSION['error']['incorrect password'])) {
        $error['password'] = "<p style='color:red;'>le mot de passe est incorrect</p>";
        unset($_SESSION['error']['incorrect password']);
    }
    if (isset($_POST["submitModif"])) {
        if (isset($_POST["modifyUsername"])){
            $modifyUsername = $_POST["modifyUsername"];
            $co = connexionBdd();
            $query = $co->prepare("SELECT pseudo_uti From utilisateurs where pseudo_uti = :pseudo_uti");
            $query->bindParam(":pseudo_uti", $modifyUsername);
            $query->execute();
            if ($query->rowCount() == 1){
                $_SESSION['error']['user exist'] = "1";
            }else{
                $_SESSION['all'][0]['pseudo_uti'] = $_POST["modifyUsername"];
                $query = $co->prepare("UPDATE utilisateurs SET pseudo_uti = :modifyUsername WHERE  id = :id ");
                $query->bindParam(":modifyUsername", $modifyUsername);
                $query->bindParam(":id", $_SESSION['all'][0]['id']);
                $query->execute();
            }
        }
        if (isset($_POST["modifyEmail"])){
            $modifyEmail = $_POST["modifyEmail"];
            $co = connexionBdd();
            $query = $co->prepare("SELECT email_uti From utilisateurs where email_uti = :email_uti");
            $query->bindParam(":email_uti", $modifyEmail);
            $query->execute();
            if ($query->rowCount() == 1){
                $_SESSION['error']['email exist'] = "1";
            }else{
                if (check_email_address($modifyEmail) == True) {
                    $_SESSION['all'][0]['email_uti'] = $_POST["modifyEmail"];
                    $query = $co->prepare("UPDATE utilisateurs SET pseudo_uti = :modifyEmail WHERE  id = :id ");
                    $query->bindParam(":modifyEmail", $modifyEmail);
                    $query->bindParam(":id", $_SESSION['all'][0]['id']);
                    $query->execute();
                }else{
                    $_SESSION['error']['incorrect email'] = "1";
                }
            }
        }
        if (isset($_POST["modifyPassword"])){
            if(preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$#', $_POST['modifyPassword']) AND (strlen($_POST['modifyPassword']) >= 8)){
                $modifyPassword = $_POST["modifyPassword"];
                $_SESSION['all'][0]['mot_de_passe_uti'] = $_POST["modifyPassword"];
                $query = $co->prepare("UPDATE utilisateurs SET pseudo_uti = :modifyPassword WHERE  id = :id ");
                $query->bindParam(":modifyPassword", $modifyPassword);
                $query->bindParam(":id", $_SESSION['all'][0]['id']);
                $query->execute();
            }else{
                $_SESSION['error']['incorrect password'] = "1";
            }
        }
        header('location: index.php');
    }
    if (isset($_POST["submitPoserQuestion"], $_POST["categorie"], $_POST["Question"])) {
        $categorie = $_POST["categorie"];
        $Question = $_POST["Question"];
        $co = connexionBdd();
        $query = $co->prepare("INSERT INTO question (titre_quest, cat_id, auteur_id) VALUES (:Question, :categorie, :id)");
        $query->bindParam(":Question", $Question);
        $query->bindParam(":categorie", $categorie);
        $query->bindParam(":id", $_SESSION['all'][0]['id']);
        $query->execute();
        header('location: index.php');
    }
    if (isset($_POST["submitReponse"], $_POST["Reponse"])) {
        $reponse = $_POST["Reponse"];
        $idQuestion = $_POST['idQuestion'];
        $co = connexionBdd();
        $query = $co->prepare("INSERT INTO reponse (user_id, question_id, rep_quest) VALUES (:id, :idQuestion, :reponse)");
        $query->bindParam(":reponse", $reponse);
        $query->bindParam(":idQuestion", $idQuestion);
        $query->bindParam(":id", $_SESSION['all'][0]['id']);
        $query->execute();
        header('location: index.php');
    }
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['avatar']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['avatar']['name']);
            $_FILES['avatar']['name'] = $_SESSION['all'][0]['id'].".".$infosfichier['extension'];
            echo $_SESSION['all'][0]['id'].".".$infosfichier['extension'];
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'svg');
            if (in_array($extension_upload,
            $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    for ($i = 0; $i < count($extensions_autorisees); ++$i){
                        try{
                            @unlink("../avatar/".$_SESSION['all'][0]['id'].".".$extensions_autorisees[$i]);
                        }
                        catch(Throwable $e){
                            null;
                        }
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../avatar/' .basename($_FILES['avatar']['name']));
                    echo "L'envoi a bien été effectué !";
                    $co = connexionBdd();
                    $query = $co->prepare("UPDATE utilisateurs SET avatar_uti = :avatar WHERE  id = :id ");
                    $query->bindParam(":avatar", $_FILES['avatar']['name']);
                    $query->bindParam(":id", $_SESSION['all'][0]['id']);
                    $query->execute();
                    $_SESSION['all'][0]['avatar_uti'] = $_FILES['avatar']['name'];
                    header('location: index.php');
                }else{
                    $error['uploadFile'] = True;
                }
        }
    }
function ModalProfil($error){
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
                <br/>
                <img style="height:75px;width:75px;" src="../avatar/<?php echo $_SESSION['all'][0]['avatar_uti'] ?>">
                <form method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar" required /><br />
                        <input type="submit" value="Envoyer le fichier" />
                        <?php 
                        if ($error['uploadFile'] == True){
                            echo "<p>the file isn't a picture</p>";
                        }
                        ?>
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<body>
    <header>
    <?php
    if ($_SESSION['loading'] == "load"){ ?>
        <div style="position: absolute; left: 50%;">
            <div class="sucess padding-right-20 padding-left-20">
                <h1>Bienvenue <?php echo $_SESSION["all"][0]['pseudo_uti']; ?> !</h1>
            </div>
        </div>
        <?php include("../include/navbar.php");?>
    <?php
    }else{
    ?>
        <div style="position: absolute; left: 50%;">
            <div class="sucess padding-right-20 padding-left-20" data-aos="fade-down">
                <h1>Bienvenue <?php echo $_SESSION['pseudo']; ?> !</h1>
            </div>
        </div>
        <?php include("../include/navbar.php");?>
    <?php 
    $_SESSION['loading'] = "load";
    } 
    ?>
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
                        <label for="Question">Titre de la question: </label>
                        <input type="text" name="Question" required>
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
                        <button type="submit" name="submitPoserQuestion"> poser la question </button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="center-400-px clearfix padding-top-100">
        <form method="post"><button id="firstButton" class="btn gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10" name="section" value="1" type="submit">les question</button></form>
        <form method="post"><button id="secondButton" class="btn gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10" name="section" value="2" type="submit">vos question</button></form>
        <form method="post"><button id="thirdButton" class="btn gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10" name="section" value="3" type="submit">profile</button></form>
    </div>
    <div id="firstlink" class=" lien1 padding-top-50 clearfix">
    <?php 
	$co = connexionBdd();
    $query = $co->prepare("SELECT utilisateurs.pseudo_uti, question.date_crea, categorie.nom_cat, question.id, question.titre_quest, utilisateurs.avatar_uti, utilisateurs.id from question join utilisateurs on utilisateurs.id = question.auteur_id join categorie on question.cat_id = categorie.id ORDER BY `question`.`date_crea` DESC");
    $query->execute();
    if ($_SESSION['all'][0]['role_uti'] == 'A'){$button = "<button style='background-color: red;' type='button' class='btn'>supprimer</button>";}
    else{$button = "<button style='background-color: orange;' type='button' class='btn'>report</button>";}
    while ($donnees = $query->fetch()){
        $contenant="";
        $nombreDereponse = 0;
        $other = $co->prepare("SELECT utilisateurs.pseudo_uti, utilisateurs.email_uti, question.auteur_id, question.id, question.titre_quest, question.date_crea, reponse.rep_quest, utilisateurs.avatar_uti from reponse join utilisateurs on utilisateurs.id = reponse.user_id join question on question.id = reponse.question_id where question.id = ".$donnees[3]);
        $other->bindParam(":id", $_SESSION['all'][0]['id']);
        $other->execute();
        while ($reponse = $other->fetch()){
            $contenant = $contenant."
            <div class='margin-top-25'>
                <div style='background-color:white;' class='center-90-percent'>
                    <div class='container padding-top-10'>
                        <div style='width: 100px; height:150px; position:absolute;' class='padding-right-10'>
                            <img style='height:75px;width:75px;' src='../avatar/".$reponse['avatar_uti']."'>
                        </div>
                        <div class='padding-left-100 container'>
                            <div class='clearfix'>
                                <div class='profile float-start'>
                                    <h5>".$reponse['pseudo_uti']."</h5>
                                </div>
                                <div class='profile float-end'>
                                    ".$button."
                                </div>
                            </div>
                            <div class='titre'>
                                <h5>
                                    ".$reponse['rep_quest']."
                                </h5>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>";
            $nombreDereponse = $nombreDereponse + 1;
        }
        $buttonAfficher = "";
        $tailleDiv = "padding-bottom-50 div-all";
        $modalButtonAfficher = "";
        if ($nombreDereponse != 0){
            $tailleDiv = "";
            $buttonAfficher = "
            <div>
                <p>les reponse : <button class='btn btn-secondary' type='button' data-bs-toggle='modal' data-bs-target='#afficherreponseQuestion".$donnees[3]."'>afficher</button></p>
            </div>";
            $modalButtonAfficher = "
            <div class='modal fade' id='afficherreponseQuestion".$donnees[3]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-xl'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLongTitle'>Poser votre question</h5>
                        </div>
                        <div class='modal-body'>
                            ".$contenant."
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </div>
            </div>";
        }else{$nombreDereponse = "aucune reponse";}
    
        echo"
        <div class='margin-top-25'>
            <div style='background-color:white;' class='center-80-percent'>
                <div style='border: solid; border-color: #ED008C;' class='padding-top-10 ".$tailleDiv."'>
                    <div style='width: 100px; height:150px; position:absolute;' class='padding-right-10 padding-top-10'>
                        <img class='profilePicture';' src='../avatar/".$donnees[5]."'>
                    </div>
                    <div class='padding-left-100 container content'>
                        <div class='clearfix'>
                            <div class='profile float-start'>
                                <h5>".$donnees[0]."</h5>
                            </div>
                            <div class='profile float-end'>
                                ".$button."
                            </div>
                        </div>
                        <div class='titre'>
                            <h5>
                                ".$donnees[4]."
                            </h5>
                        </div>
                        <hr>
                        <div class='clearfix div-button-p'>
                            <p style='width:80%;' class='float-start'>".$donnees[1]."/".$donnees[2]."/".$nombreDereponse." </p><button style='background-color:aliceblue;' class='float-end btn repondre-button' type='button' data-bs-toggle='modal' data-bs-target='#repondreQuestion".$donnees[3]."'> Repondre </button>
                        </div>
                        ".$buttonAfficher."
                    </div>
                </div>
            </div>
        </div>
        ".$modalButtonAfficher."
        <div class='modal fade' id='repondreQuestion".$donnees[3]."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-lg'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLongTitle'>Poser votre question</h5>
                    </div>
                    <div class='modal-body'>
                        <form method='post'>
                            <input name='idQuestion' type='hidden' value='".$donnees[3]."'></label>
                            <label for='TitreQuestion' class='form-label'>contenue de la reponse :  </label>
                            <textarea class='form-control' type='text' rows='5' name='Reponse' required></textarea>
                            <button type='submit' name='submitReponse' class='margin-top-10 btn btn-secondary float-end'> poser la reponse </button>
                        </form>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
    </div>
    <div id="secondlink" class="container center-60-percent lien2 padding-top-50 clearfix display-none border">
        <div class="echoQuestion">
        <?php 
            $co = connexionBdd();
            $query = $co->prepare("SELECT utilisateurs.id, utilisateurs.pseudo_uti, utilisateurs.email_uti, question.auteur_id, question.id, question.titre_quest, question.date_crea FROM utilisateurs INNER JOIN question ON question.auteur_id = :id AND utilisateurs.id = :id");
            $query->bindParam(":id", $_SESSION['all'][0]['id']);
            $query->execute();
            // $result = $query->fetchAll();
            // var_dump($result);
            // On affiche chaque entrée
            echo '<h3">Vos Question :</h3>
            <table border="1" bordercolor="#ff0000" style="width:100%;">
                <tr>
                    <th>id</th> 
                    <th>Pseudo</th>
                    <th>email</th>
                    <th>auteur_id</th>
                    <th>id question</th>
                    <th>titre_quest</th>
                    <th>date question</th>
                </tr>';
                while ($donnees = $query->fetch())
                {
                echo'<tr>
                        <td>' . $donnees[0] . '</td>
                        <td>' . $donnees[1] . '</td>
                        <td>' . $donnees[2] .'</td>
                        <td>' . $donnees[3] . '</td>
                        <td>' . $donnees[4] . '</td>
                        <td>' . $donnees[5] . '</td>
                        <td>' . $donnees[6] . '</td>
                    </tr>';
                }
            echo'</table>'; ?>
        <!-- faire apparaitre les question posé stocker dans la bdd -->
        </div>
    </div>
    <div id="thirdlink" class="container center-70-percent lien3 padding-top-50 clearfix display-none">
        <h3><?php echo $_SESSION['all'][0]['pseudo_uti']; ?></h3>
        <?php echo $error['user']; ?>
        <form method="post">
            <label for="modifyUsername">Changer votre nom d'utilisateur :</label>
            <input type="text" name="modifyUsername" required="">
            <input type="submit" name="submitModif" value="Confirmer le changement">
        </form>
        <br/>
        <h3><?php echo $_SESSION['all'][0]['email_uti']; ?></h3>
        <?php echo $error['email']; ?>
        <form method="post">
            <label for="modifyEmail">Changer votre nom d'utilisateur :</label>
            <input type="text" name="modifyEmail" required="">
            <input type="submit" name="submitModif" value="Confirmer le changement">
        </form>
        <br/>
        <h3>changer le mot de passe</h3>
        <?php echo $error['password']; ?>
        <form method="post">
            <label for="modifyPassword">Changer votre nom d'utilisateur :</label>
            <input type="text" name="modifyPassword" required="">
            <input type="submit" name="submitModif" value="Confirmer le changement">
        </form>
        <br/>
        <img style="height:75px;width:75px;" src="../avatar/<?php echo $_SESSION['all'][0]['avatar_uti'] ?>">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required /><br />
            <input type="submit" value="Envoyer le fichier" />
            <?php 
            if ($error['uploadFile'] == True){
                echo "<p>the file isn't a picture</p>";
            }
            ?>
            </p>
        </form>

    </div>
    <?php
    if (isset($_POST["section"])){
        echo "<script>link1(".$_POST['section'].")</script>";
        $_SESSION['section'] = $_POST['section'];
    }else{
        if (isset($_SESSION['section'])){
            echo "<script>link1(".$_SESSION['section'].")</script>";
        }else{
            echo "<script>link1('1')</script>";
        } 
    }
    
        ?>
    <footer class="padding-top-100">
        <div style="position: absolute; bottom: 0;width:100%;" class="bg-color-black">
            <div style="position:relative;" class="clearfix center-70-percent margin-top-100">
                <p class="links color-white float-start"> © 2019 Page protected by reCAPTCHA and subject to Google's <a class="decoration-none" href="">Privacy Policy</a> and <a class="decoration-none" href=" ">Term of Service</a> </p>
                <img src="../images/links.jpg " class="linksImg margin-top-10 float-end">
            </div>
        </div>
    </footer>
    <?php include('../include/script.php');?>
</body>

</html>