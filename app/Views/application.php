<!DOCTYPE html>
<html lang="fr">
        <head>
            <title><?= $title; ?></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Fcommefleurs est un magasin de ventes de fleurs en ligne.">
            <meta name="keywords" content="Ventes de fleurs">
            <link rel="stylesheet" href="../assets/css/style.css"><!--Here I have my link to my css-->
            <link rel="stylesheet" href="../assets/bootstrap-5.2.0/dist/css/bootstrap.css">
            <script src="https://kit.fontawesome.com/92c3f0e192.js" crossorigin="anonymous"></script>
            <script src="../assets/bootstrap-5.2.0/dist/js/bootstrap.bundle.min.js"></script>

            
        </head>
        <body>
        <div class="container">
            <header class="pt-4 pb-4 d-flex flex-wrap align-items-center justify-content-center  justify-content-md-between">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="accueil.php"><img width="270" height="100" src="../assets/images/logo_fomme_fleurs_270x100px-min.png" alt=""></a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"> 
                    <li>
                        <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="Home">Accueil</a>
                    </li>
                    <li>
                    <a class='nav-link px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="shop">Boutique</a>
                    </li>
                    <li>
                    <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="team"> L'équipe</a>
                    </li>
                    <li>
                    <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="contact">Nous contacter</a>
                    </li>
                </ul>
                <div class="col-md-3 text-end">                  
                                    
                <?php
                        if($connected==true){
                            if($admin==true){

                        
                    ?> 
                    <div class="dropdown col-md-3 text-end">
                            <a class='btn btn-primary dropdown-toggle' href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Tableau de board</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="dashboard">dashboard</a></li>
                                <li><a class="dropdown-item" href="messages">Consulter les messages</a></li>
                                <li><a class="dropdown-item" href="product">Consulter les produits</a></li>
                            </ul>
                            </div>
                        <?php }
                        ?>
                         <a href="connexion"><button class='btn btn-warning'>Logout</button></a>
                         <?php
                        }else{

                        ?>
                            <a class="me-2" href="connexion"><button class='btn btn-outline-primary'>Login</button></a>
                            <a href="user"><button class='btn btn-primary'>Sign-up</button></a></div>
     
                        <?php
                        }
                        ?>
            </header>
            <h5 class="hr">
                BY FREDERIC
            </h5>
            <main>
                <?= $content
                ?>
            </main>
           
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a class="mb-3 me-2 md-md-0 text-muted text-decoration-none lh-1" href="/">
                        <img src="../assets/images/pot_de_fleur-min.png" alt="" width="30" height="24">
                    </a>
                    <span class="text-muted">
                        &copy; 2022 FcommeFLEURS by Fréderic <em>Antibes</em>
                    </span>
                </div>
                <ul class="social-media nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="text-decoration-none social-icon social-icon-footer d-flex align-items-center justify-content-center" href="https://www.instagram.com/fcommefleursantibes/">
                        <i class="fa-brands fa-instagram">
                        </i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="text-decoration-none social-icon social-icon-footer d-flex align-items-center justify-content-center" href="https://www.facebook.com/F-comme-Fleurs-Antibes-107206567645326">
                        <i class="fa-brands fa-facebook">
                        </i>
                        </a>
                    </li>
                </ul>
        </footer>        
        </div>

       
    </body>   
</html>