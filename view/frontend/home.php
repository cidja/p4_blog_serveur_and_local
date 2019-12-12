<?php $title = "Accueil"; 

ob_start(); //Commencement de la capture ?> 

<div id="blocPage">
    <div id="contentHome">
        <div class="col-12 d-flex justify-content-center">
            <div id="filterHome" class="col-10">
                <section id="headerHome">
                    <div class="container text-white">
                        <div class="row">
                            <div class="text-center">
                                <div id="titleHome">
                                    <h1>Bienvenue sur Le blog de Jean Forteroche</h1>
                                    <p>Ce blog est une nouvelle approche que je tente, vous allez pouvoir découvrir la naissance de mon roman "Billet simple pour l'Alaska",
                                        en effet je publie réguliérement des article avec des chapitres de mon livre, j'attends vos commentaires pour ensuite le modifier pour qu'il 
                                        corresponde le mieux à vos attentes.</p>
                                    <p>Bonne lecture à tous</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="sectionHome1">
                    <div class="container text-white">
                        <div class="row">
                            <div class="text-center">
                                <h2>Un roman en ligne ?</h2>
                                <img id="img1" class="img-responsive col-5" src="public/img/readerHome.jpg" alt="liseuse sur un bureau">
                                <p>C'est une nouveauté pour moi, après l'écriture de plusieurs romans dans mon "coin" je me lance dans le futur et je vous fais participer
                                    activement à la rédaction de mon futur roman <strong>"La tâche"</strong> vous allez pouvoir me donner des idées et vos retours pertinents
                                    seront peut être intégrés à l'histoire à paraître</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="sectionHome2">
                    <div class="container text-white">
                        <div class="row">
                            <div class="text-center">
                                <h2>Consulter les articles</h2>
                                <img id="img2" class="img-responsive col-5" src="public/img/openBook.jpg" alt="une fille qui tiens un livre ouvert">
                                <p>Le roman se découpe en plusieurs articles que je vous invite a parcourir et a me laisser un petit commentaire,
                                    les avis des lecteurs sont très important pour l'avancement de ce projet.</p>
                                <p>Excellente lecture à tous</p>
                                <a class="col-md-2 btn btn-success mb-5" href="index.php?action=listPosts"> Consulter les articles</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();

 require("template.php"); 

/*Ce code fait 3 choses :

    Il définit le titre de la page dans $title. Celui-ci sera intégré dans la balise <title> dans le template.

    Il définit le contenu de la page dans $content. Il sera intégré dans la balise <body> du template.
    Comme ce contenu est un peu gros, on utilise une astuce pour le mettre dans une variable. On appelle 
    la fonction ob_start() (ligne 3) qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, on récupère 
    le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .

    Enfin, il appelle le template avec un require. Celui-ci va récupérer les variables $title et $content qu'on vient de créer... pour afficher la page !
*/
?>
