<nav style="position:relative; z-index:1;" class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a style="margin-left: 50px;" class="navbar-brand" href="<?php echo($up);?>index.php">Saint Vincent BTS 1</a>
        <a id="logout" style="display: none;" href="../Authentification_PHP/logout.php" type="button" class="btn btn-outline-primary btn-sm">Déconnexion</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="me-auto"></ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">lien1</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">lien2</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">lien3</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div style="margin-right: 50px;" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">lien4</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <button style="height: 50px; width: 150px;" id="connexion" type="button" class="btn btn-primary connexion" onclick="window.location.href='Authentification_PHP/login.php'">se connecter</button>
            <button style="height: 50px; width: 200px;" id="posequestion" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalQuestion">poser une question</button>
        </div>
        <area style="margin-right: 50px; height:50px;">
        <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </div>