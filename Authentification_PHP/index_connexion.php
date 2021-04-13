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
		<?php require('connexion.php'); ?>
	 <?php include('../include/head.php'); ?>
	   <link rel="stylesheet" href="style_connecter.css" />
	   <!-- cdn bootstrap -->
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="sucess">
			<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?> !</h1>
			<a href="logout.php">Déconnexion</a>
		</div>
		
		
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalQuestion">
  Poser une question
</button>

<!-- Modal -->
<div class="modal fade" id="ModalQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Poser votre question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

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
                                <td>' . $donnees['...'] . '</td>
                                <td>' . $donnees['...'] . '</td>
                                <td>' . $donnees['...'] .'</td>
                                <td>' . $donnees['...'] . '</td>
                                
                            </tr>';
                        }
                echo'</table>'; ?>	<!-- faire apparaitre les question posé stocker dans la bdd -->
</div>
		
	</body>
</html>