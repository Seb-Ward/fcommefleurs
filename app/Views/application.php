<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title; ?></title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Fcommefleurs est un magasin de ventes de fleurs en ligne."/>
        <meta name="keywords" content="Ventes de fleurs"/>
        <link rel="shortcut icon" type="image/jpeg" href="/favicon.ico"/>
        <link rel="stylesheet" href="/assets/css/style.css"/>
        <link rel="stylesheet" href="/assets/css/main.css"/>
        <link rel="stylesheet" href="/node_modules/datatables.net-dt/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.min.css"/>
        <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="https://kit.fontawesome.com/92c3f0e192.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <header class="pt-3 pb-1 flex-wrap align-items-center justify-content-center  justify-content-md-between">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0" href="/Home">
                                    <img width="293" height="120" src="/assets/images/logo_fomme_fleurs_270x100px-min.png" alt="">
                                </a>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <ul class="nav mb-2 justify-content-center mb-md-0">
                                    <li>
                                        <a class='nav-link px-2 link-<?= $page == 'accueil' ? "secondary" : "dark" ?>' href="/Home">Accueil</a>
                                    </li>
                                    <li>
                                        <div class="col-md-3 text-end">
                                            <a class='nav-link dropdown-toggle px-2 link-<?= $page == 'boutique' ? "secondary" : "dark" ?>' href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Boutique</a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <?php foreach ($shopCategorie as $categorie) { ?>
                                                    <li>
                                                        <a class="dropdown-item" href="/shop/<?= $categorie->id ?>"><?= $categorie->name ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class='nav-link px-2 link-<?= $page == 'equipe' ? "secondary" : "dark" ?>' href="/team">L'équipe</a>
                                    </li>
                                    <li>
                                        <a class='nav-link px-2 link-<?= $page == 'contact' ? "secondary" : "dark" ?>' href="/contact">Nous contacter</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-center text-end">
                                <div class="menu-icon me-4">
                                    <a class="link-dark" href="/basket">
                                        <?php if ($itemBasket > 0) { ?>
                                            <span class="notif-basket"><?= $itemBasket ?></span>                    
                                        <?php } ?>
                                        <i class="fa-solid fa-basket-shopping d-block"></i>
                                    </a>
                                </div>
                                <div class="menu-icon me-1">
                                    <?php if ($connected == true){ ?>
                                        <div class="dropdown me-1 dropdown-dashboard">
                                            <a class='link-dark fa-solid fa-user dropdown-toggle' href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"></a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <?php if ($admin) { ?>
                                                    <li><a class="dropdown-item" href="/dashboard">Tableau de bord</a></li>
                                                    <li><a class="dropdown-item" href="/messages">Consulter les messages</a></li>
                                                    <li><a class="dropdown-item" href="/product">Consulter les produits</a></li>
                                                    <li><a class="dropdown-item" href="/customer">Gestion des clients</a></li>
                                                    <li><a class="dropdown-item" href="/admin">Gestion des administrateurs</a></li>
                                                    <li><a class="dropdown-item" href="/order">Gestion des commandes</a></li>
                                                <?php } else { ?>
                                                    <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                                                    <li><a class="dropdown-item" href="#">Suivre mes commandes</a></li>
                                                    <li><a class="dropdown-item" href="#">Mes factures</a></li>
                                                <?php } ?>
                                                <li><a class="link-danger dropdown-item" href="/connection/deconnect">Déconnexion</a></li>
                                            </ul>
                                        </div>                                
                                    <?php } else { ?>
                                        <a class="link-dark" href="/connection">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 my-1 text-end">
                    <img width="92" height="23" src="/assets/images/logo_interflora_min.png"/>
                </div>
            </div>
            <h5 class="hr">
                BY FREDERIC
            </h5>
            
            <main>
                <?= $content ?>
            </main>
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a class="mb-3 me-2 md-md-0 text-muted text-decoration-none lh-1" href="/">
                        <img src="/assets/images/pot_de_fleur-min.png" alt="" width="24" height="24">
                    </a>
                    <span class="text-muted">&copy; 2022 FcommeFLEURS by Fréderic <em>Antibes</em></span>
                </div>
                <ul class="social-media nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="text-decoration-none social-icon social-icon-footer d-flex align-items-center justify-content-center"
                           href="https://www.instagram.com/fcommefleursantibes/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="text-decoration-none social-icon social-icon-footer d-flex align-items-center justify-content-center"
                           href="https://www.facebook.com/F-comme-Fleurs-Antibes-107206567645326" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </footer>
            <div id="spinner-div" class="pt-5">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
        </div>
        <script src="/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="/node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js"></script>
        <script src="/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/assets/js/application.js"></script>
    </body>
</html>