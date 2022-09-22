<form action="/product/add" method="POST" enctype="multipart/form-data"><!--on top of ussing the $_POST method we also use enctype ="multipart" to insert a picture in a form--> 
                        <fieldset>
                            <h5 class="card-tittle text-center text-secondary">Ajout d'un nouveau produit à la boutique</h5>
                                <div><!--Here we insert a new product to the data base-->
                                    <label for="produit_nom">Nom du produit</label>
                                        <input type="produit_nom" name="produit_nom" id="produit_nom" required>
                                </div>
                                <div>
                                <label for="produit_description"></label>
                                <textarea name="produit_description" id="produit_description" cols="40" rows="20" 
                                    placeholder="description du produit"></textarea> 
                                <div class="mb-3">
                                    <label for="image" class="form-label">Choisir des photos:</label><input type="file" name="image" id="image" multiple class="form-control" >
                                </div>
                                </div>
                                <div>
                                    <label for="produit_prix">Prix ttc</label>
                                    <input type="produit_prix" name="produit_prix" id="produit_prix" required>
           
                                </div>
                                <div>
                                    <input type="checkbox" id="produit_publish_accueil" name="produit_publish_accueil" >
                                    <label for="produit_publish_accueil">Afficher le produit sur la page d'accueil
                                    </label>
                                </div>    
                                <div>
                                    <input type="checkbox" id="produit_publish_boutique" name="produit_publish_boutique">
                                    <label for="produit_publish_boutique">Afficher le produit en boutique
                                    </label>
                                </div>            
                                    <input type="submit" valeur= "enregistrer">
                            </fieldset>
                    </form>