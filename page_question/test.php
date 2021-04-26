<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php $title = 'test'; ?>
    <?php $up = '../'; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css" />
    <?php include('../include/head.php'); ?>
</head>

<body>
    <div class="center-80-percent ">

        <div class="laQuestion container rounded border border-2 border border-dark">
            <div class="profile">
                <p>
                <h5>(nom profil) (image de profil) </h5> (date de post)/(tag)</p>
            </div>
            <div class="titre">
                <h5>
                    La Question.....
                </h5>
            </div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#reponseQuestion"> Repondre </button>
            
            <div class="modal fade" id="reponseQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Repondre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                                <label for="reponseQuestion">Votre Réponse:</label>
                                <input type="text" name="reponseQuestion" required>

                                <input type="submit" name="submitReponse" value="Confirmer la réponse">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- Modal -->
    <div class="center-80-percent">
        <div style="border: solid; border-color: #ED008C;" class="container rounded padding-top-10">
            <div style="background-color: green; width: 100px; height:150px; position:absolute;" class="padding-right-10">
                (image de profil)
            </div>
            <div style="background-color: red;" class="padding-left-100 container">
                <div class="clearfix">
                    <div class="profile float-start">
                        <h5>(nom profil) </h5>
                    </div>
                    <div class="profile float-end">
                        <button type="button">report</button><button type="button">supprimer</button>
                    </div>
                </div>
                <div class="titre">
                    <h5>
                        bonjour je suis une question et j'attend une reponse, je suis une question qui vien du site livequestion
                    </h5>
                </div>
                <hr>
                <div class="clearfix">
                    <p style="width:80%;" class="float-start">(date de post)/(tag)/(nombre de reponse) </p><button class="float-end" type="button" data-bs-toggle="modal" data-bs-target="#reponseQuestion"> Repondre </button>
                </div>
                <div>
                    <p>les reponse : </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>