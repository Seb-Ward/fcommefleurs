<h3>
                    Listing
                </h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nom du produit</th>
                                    <th>description</th>
                                    <th>prix</th>
                                    <th>photos</th>
                                    <th>Publier page d'accueil</th>
                                    <th>Publier boutique</th>
                                    <th>modifier</th>
                                    <th>Suprimer</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php  
                                        foreach($product_list as $produit){
                                            //Here I do a request to my data base without doing a prepare because it isn't gonna change it is solid.(She display all the questions given)
                                    ?>
                                        <tr>
                                            <td><?=$produit->getproduit_id()?></td><!--extraction of my product_id using my function-->
                                            <td><?=$produit->getproduit_nom()?></td><!--extraction of my product_name using my function-->
                                            <td><?=substr($produit->getproduit_description(),0,200)?></td><!--extraction of my product_description using my function-->
                                            <td><?=$produit->getproduit_prix()?></td><!--extraction of my product_price using my function-->
                                            <td>                                <img src="data:image/jpeg;base64,<?=base64_encode($produit->getImage()->getImage_bin())?>" alt="<?=$produit->getproduit_description()?>" width="100" height="100" class="rounded mx-auto d-block" >
                                            </td><!--extraction of my image & image_id using my function-->
                                            <td><?=$produit->getproduit_publish_accueil()?></td>
                                            <td><?=$produit->getproduit_publish_boutique()?></td>
                                            <td><a class="btn btn-primary" href="../vue/form_modification_produit.php?id=<?=$produit->getproduit_id()?>">Modifier</a></button></td><!--Button to modifie the product. It will take the product_id and take me to form_modification_produit.php -->
                                            <td><a class="btn btn-danger"  href="../controleur/suppression_produit.php?id=<?=$produit->getproduit_Id()?>">Suprimer</a></td><!--Button that will erase the product from the data base the listing and the shop with a process in suppression_produit.php -->
                                        </tr>
                                            <?php }
         
                                                ?>
       
                                </tbody>
                        </table>
                            <a class='btn btn-warning'href="../vue/form_ajout_produit.php">Ajouter un nouveau produit</a>

                    </div>