<!DOCTYPE html>
<html>
<head>
    <?php $home = ''; ?>
    <?php $title = 'livequestion'; ?>
    <?php $up = ''; ?>
    <?php include('include/head.php'); ?>
    <link href="Css/style_index.css" type="text/css" rel="stylesheet">
</head>
<body>

    <header>
        <?php include('include/navbar.php'); ?>
    </header>
    <section class="Acceuil bg-image container-fluid acceuil clearfix padding-top-50">
        <!--        <img src="images/fondDecran.png" class="imgAcceuil"> -->
        <div class="text-white float-start acceuilText">
            <div class="centerMedia">
                <h1 class="titreAcceuilLigne1">Lorem ipsum</h1>
                <h1 class="titreAcceuilLigne2">dolor sit</h1>
            </div>
            <h1 class="titreAcceuilLigne3">amet.</h1>
            <div class="txtAcceuil">
                <p class="txtAcceuilMedia">Sed elit libero. accumsan et volutpat id, aliquam
                </p>
                <p class="txtAcceuilMedia">tristique odio. Mauris sed lectus a justo malesuada
                </p>
                <p class="txtAcceuilMedia">dapibus . Morbi eleifend tellus nisi sed ullamcorper
                </p>
                <p class="txtAcceuilMedia">mi tincidunt faucibus. Mauris justo totor. tempor
                </p>
                <p class="txtAcceuilMedia">ut odio in, dictum malesuada eros.
            </div>
            <div class="placementButton">
                <button type="button" class="btn btn-primary butonAcceuil">Bouton CTA</button>
            </div>
        </div>
        <div class="placementImg">
            <img src="images/step-1.png" class=" float-start tailleImg">
        </div>
    </section>
    <section class="section2">
        <div class="container notMedia clearfix padding-top-150 padding-bottom-100">
            <div class="gap-3 float-start">
                <img class="tailleImg" src="images/i1.png">
                <h3 class="padding-top-20">Suits Your Style</h3>
                <p>Drogon sed ut perspiciatis unde omnis iste error sit voluptatem accusantium doloremque laudantiugn, totam aperiam, eaque Arya</p>
            </div>
            <div class="gap-3 float-start">
                <img class="tailleImg" src="images/i2.png">
                <h3 class="padding-top-20">Ut posuere molestie</h3>
                <p>Duis convallis convallis tellus imp interdum. Non diam phasellus vestibulum lorem sed risus ultricies Tyrion. Enim blandit volutpat.</p>
            </div>
            <div class="gap-3 float-start">
                <img class="tailleImg" src="images/i3.png">
                <h3 class="padding-top-20">Vestibulum ut erat consectetur</h3>
                <p>Eunuch sed blandit libero volutpat sed cras. Cersei quis imperdiet tincidunt unuch pulvinar sapien. Habitasse platea Davos vestibulum.</p>
            </div>
        </div>
        <div class="container media padding-top-50 padding-bottom-50">
            <div class="">
                <img class="tailleImg" src="images/i1.png">
                <h3 class="padding-top-20">Suits Your Style</h3>
                <p>Drogon sed ut perspiciatis unde omnis iste error sit voluptatem accusantium doloremque laudantiugn, totam aperiam, eaque Arya</p>
            </div>
            <div class="">
                <img class="tailleImg" src="images/i2.png">
                <h3 class="padding-top-20">Ut posuere molestie</h3>
                <p>Duis convallis convallis tellus imp interdum. Non diam phasellus vestibulum lorem sed risus ultricies Tyrion. Enim blandit volutpat.</p>
            </div>
            <div class="">
                <img class="tailleImg" src="images/i3.png">
                <h3 class="padding-top-20">Vestibulum ut erat consectetur</h3>
                <p>Eunuch sed blandit libero volutpat sed cras. Cersei quis imperdiet tincidunt unuch pulvinar sapien. Habitasse platea Davos vestibulum.</p>
            </div>
        </div>
    </section>
    <section class="section3 padding-top-75 padding-bottom-50">
        <div class="container center-600-px">
            <h1 class="text-center">Aenean magna odio</h1>
            <p class="padding-top-20 text-center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
            <div class="container clearfix padding-top-25 center-300-px lien">
                <button onclick="link1()" id="firstButton" class="gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10">Lien1</button>
                <button onclick="link2()" id="secondButton" class="btn gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10">Lien2</button>
                <button onclick="link3()" id="thirdButton" class="btn gap-3 color-pink text-center float-start padding-top-10 padding-bottom-10">Lien3</button>
            </div>
        </div>
        <div id="firstlink" class="container center-70-percent lien1 padding-top-50 clearfix">
            <div class="placementImg">
                <img src="images/step-2.jpg" class="img-up float-start">
            </div>
            <div class="container float-start gap-2 padding-left-50 padding-top-50 container-text">
                <h2 class="float-none">Praesent vitae velit tristique old alos</h2>
                <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
                <div class="container clearfix bg-white">
                    <img class="float-start img" src="images/persona3.jpg">
                    <p>"Proin vel dolor dictum, congue tellus at, lobortis neque"</p>
                </div>
            </div>
        </div>
        <div id="secondlink" class="container center-70-percent lien2 padding-top-50 clearfix">
            <div class="container float-start gap-400-px padding-top-50">
                <h2 class="float-none">Duis et eros lorem.</h2>
                <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
                <div class="container clearfix bg-white">
                    <img class="float-start img" src="images/persona2.jpg">
                    <p>"Aliquam gravida magna ut"</p>
                </div>
            </div>
            <div class="placementImg">
                <img src="images/step-3.jpg" class="img-up float-start padding-left-50">
            </div>
        </div>
        <div id="thirdlink" class="container center-70-percent lien3 padding-top-50 clearfix">
            <div class="container float-start gap-400-px padding-top-50">
                <h2 class="float-none">Curabitur gravida metus at mi malesuada.</h2>
                <p>Ned ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
                <div class="container clearfix bg-white">
                    <img class="float-start img" src="images/persona1.jpg">
                    <p>"malesuada."</p>
                </div>
            </div>
            <div class="placementImg">
                <img src="images/step-4.png" class="img-up float-start padding-left-50">
            </div>
        </div>
    </section>
    <section class="section4 padding-top-250 padding-bottom-250 ">
        <div class="container-fluid bigBlack badge ">
            <img src="images/iplay.png " class="iplay">
            <h2>"Nulla venenatis magna fringilla"</h2>
        </div>
    </section>
    <section class="section5">
        <div class="container-fluid bigPink ">
            <h1>Etiam Laot, Alique Sceleris</h1>
            <p>Sed up perpiciatis unde omnis iste natus error sit voluptatem<br> accusantium doloremqe laudantium, totam rem aperiam aeque ipsa </p>
            <div class="container center-500-px padding-top-50">
                <button type="button " class="btn btn-light "><img src="images/marque1.jpg "
                        class="imgMarque ">Kyan Boards</button>
                <button type="button " class="btn btn-light "><img src="images/marque2.jpg "
                        class="imgMarque ">Atica</button>
                <button type="button " class="btn btn-light "><img src="images/marque3.jpg "
                        class="imgMarque ">Treva</button>
                <button type="button " class="btn btn-light "><img src="images/marque4.jpg "
                        class="imgMarque ">Kanba</button>
            </div>
            <div class="container center-400-px padding-top-10 ">
                <button type="button " class="btn btn-light "><img src="images/marque5.jpg "
                        class="imgMarque ">Tvit Forms</button>
                <button type="button " class="btn btn-light "><img src="images/marque7.jpg "
                        class="imgMarque ">Aven</button>
                <button type="button " class="btn btn-light "><img src="images/marque6.jpg "
                        class="imgMarque ">Utosia</button>
            </div>
        </div>
    </section>
    <section class="section6 padding-bottom-100">
        <div class=" container-fluid faqDiv ">
            <h1>FAQ</h1>
            <p class="pDeFaq ">Sed up perpiciatis unde omnis iste natus error sit voluptatem<br> accusantium doloremqe laudantium, totam rem aperiam aeque ipsa </p>
            <br>
            <div class=" container-fluid center-500-px">
                <div class="btn-group dropend w-100">
                    <button type="button " class="btn dropdown-toggle border" data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>Can I upgrade later on ?</strong></button>
                </div>
                <div class="btn-group dropend w-100">
                    <button type="button " class="margin-top-10 btn border dropdown-toggle " data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>Can I port my data from another provider?</strong></button>
                </div>
                <div class="btn-group dropend w-100">
                    <button type="button " class="margin-top-10 btn border dropdown-toggle " data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>Are my food photo stored forever in the cloud?</strong></button>
                </div>
                <div class="btn-group dropend w-100">
                    <button type="button " class="margin-top-10 btn border dropdown-toggle " data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>Who foots the bills for that?</strong></button>
                </div>
                <div class="btn-group dropend w-100">
                    <button type="button " class="margin-top-10 btn border dropdown-toggle " data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>What's the real cost?</strong></button>
                </div>
                <div class="btn-group dropend w-100">
                    <button type="button " class="margin-top-10 btn border dropdown-toggle " data-toggle="dropdown" aria-haspopup="true " aria-expanded="false "><strong>Can my company request a custom plan?</strong></button>
                </div>
            </div>
            <div class="padding-bottom-100 padding-top-25">
                <p class="abo bg-light center-300-px padding-bottom-10 padding-top-10">Still have unanswered question? <a href="" class="aboLien">Get in touch</a></p>
            </div>
        </div>
    </section>
    <footer class="padding-top-300">
        <div class="border-bottom center-70-percent"></div>
        <div class="container-fluid linkAll padding-top-10 padding-bottom-10 center-70-percent">
            <p class="links "> © 2019 Page protected by reCAPTCHA and subject to Google's <a class="decoration-none" href="">Privacy Policy</a> and <a class="decoration-none" href=" ">Term of Service</a> </p>
            <img src="images/links.jpg " class="linksImg float-end">
        </div>
    </footer>
</body>

</html>