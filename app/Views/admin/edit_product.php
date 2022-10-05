<form action="/product/add" method="POST" enctype="multipart/form-data" id="edit_product">
    <!--on top of ussing the $_POST method we also use enctype ="multipart" to insert a picture in a form-->
    <fieldset>
        <h5 class="card-tittle text-center text-secondary">Ajout d'un nouveau produit à la boutique</h5>
        <div><!--Here we insert a new product to the data base-->
            <label for="produit_nom">Nom du produit</label>
            <input type="text" name="produit_nom" id="produit_nom" value="<?= ($product != null && $product->getName() != null) ? $product->getName() : "" ?>" required>
        </div>
        <div>
            <label for="produit_description"></label>
            <textarea name="produit_description" id="produit_description" cols="40" rows="20"
                      placeholder="description du produit"><?= ($product != null && $product->getDescription() != null) ? $product->getDescription() : "" ?></textarea>
            <div class="mb-3">
                <label for="image" class="form-label">Choisir des photos:</label><input type="file" name="image"
                                                                                        id="image" multiple
                                                                                        class="form-control">
            </div>
        </div>
        <div>
            <label for="produit_prix">Prix ttc</label>
            <input type="text" name="produit_prix" id="produit_prix" value="<?= ($product != null && $product->getPrice() != null) ? $product->getPrice() : "" ?>" required>
        </div>
        <div>
            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity" value="<?= ($product != null && $product->getQuantity() != null) ? $product->getQuantity() : "" ?>">
        </div>
        <div>
            <input type="checkbox" id="trendy_collection" name="trendy_collection" <?= ($product != null && $product->isTrendyCollection()) ? "checked" : "" ?>>
            <label for="trendy_collection">Selection du moment</label>
        </div>
        <div>
            <input type="checkbox" id="monthly_offer" name="monthly_offer" <?= ($product != null && $product->isMonthlyOffer()) ? "checked" : "" ?>>
            <label for="monthly_offer">Offre du mois</label>
        </div>
        <input type="submit" value="enregistrer">
    </fieldset>
</form>