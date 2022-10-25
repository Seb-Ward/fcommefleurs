<form action="/product/edit_process" method="POST" enctype="multipart/form-data" id="edit_product">
    <fieldset>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5"></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <div class="row">
                                <div class="row no-gutters mb-5">
                                    <h5 class="card-tittle text-center text-secondary"><?= ($product != null && $product->getId() != null ? "Modification" : "Ajout") ?> d'un produit</h5>
                                    <div class="col-md-6">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <input type="hidden" name="product_id" id="product_id" value="<?= $product != null && $product->getId() != null ? $product->getId() : 0 ?>" />
                                                                                
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_name">Nom du produit*</label>
                                                        <input type="text" name="product_name" id="product_name" value="<?= ($product != null && $product->getName() != null) ? $product->getName() : "" ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="image" class="form-label">Choisir des photos:</label>
                                                        <input type="file" name="image" id="image" class="form-control" multiple accept="image/png, image/jpg, image/jpeg" onchange="loadFile(event)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="product_price">Prix TTC*</label>
                                                            <input type="text" name="product_price" id="product_price" value="<?= ($product != null && $product->getPrice() != null) ? $product->getPrice() : "" ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="quantity">Quantité</label>
                                                            <input type="number" name="quantity" id="quantity" value="<?= ($product != null && $product->getQuantity() != null) ? $product->getQuantity() : "" ?>">
                                                    </div>
                                                </div>
                                                <?php foreach ($categories_list as $categorie) { ?>
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="categorie<?= $categorie->id ?>" name="categorie" value="<?= $categorie->id ?>>" <?= ($product != null && $product->getCategorie()->getId() == $categorie->id) ? "checked" : "" ?>>
                                                            <label class="form-check-label" for="categorie<?= $categorie->id ?>"><?= $categorie->name ?></label>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-md-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="home_page" name="home_page" <?= ($product != null && $product->isHomePage()) ? "checked" : "" ?>>
                                                            <label class="form-check-label" for="home_page">Afficher sur la page d'accueil</label>
                                                    </div>  
                                                </div> 
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input class="btn btn-outline-primary" type="submit" value="Enregistrer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="product_description"></label>
                                                    <textarea name="product_description" id="product_description" cols="40" rows="7"
                                                    placeholder="description"><?= ($product != null && $product->getDescription() != null) ? $product->getDescription() : "" ?></textarea>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="product_image">
                                                    <?php foreach ($product->getImageList() as $image) { ?>
                                                        <div class="product_item">
                                                            <span class="delete-badge"><i class="fa-regular fa-trash-can"></i></span>
                                                            <img src="data:image/<?= $image->getType() ?>;base64,<?= base64_encode($image->getBin()) ?>" width="100" height="100" class="rounded mx-auto d-block"  alt=""/>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
</form>