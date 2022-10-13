<form action="/product/edit_process" method="POST" enctype="multipart/form-data" id="edit_product">
    <!--on top of ussing the $_POST method we also use enctype ="multipart" to insert a picture in a form-->
    <fieldset>
        <input type="hidden" name="product_id" id="product_id" value="<?= $product != null && $product->getId() != null ? $product->getId() : 0 ?>" />
        <h5 class="card-tittle text-center text-secondary"><?= ($product != null && $product->getId() != null ? "Modification" : "Ajout") ?> d'un produit</h5>
        <div><!--Here we insert a new product to the data base-->
            <label for="product_name">Nom du produit*</label>
            <input type="text" name="product_name" id="product_name" value="<?= ($product != null && $product->getName() != null) ? $product->getName() : "" ?>" required>
        </div>
        <div>
            <label for="product_description"></label>
            <textarea name="product_description" id="product_description" cols="40" rows="20"
                      placeholder="description"><?= ($product != null && $product->getDescription() != null) ? $product->getDescription() : "" ?></textarea>
            <div class="mb-3">
                <label for="image" class="form-label">Choisir des photos:</label>
                <input type="file" name="image" id="image" class="form-control" />
            </div>
        </div>
        <div>
            <label for="product_price">Prix TTC*</label>
            <input type="text" name="product_price" id="product_price" value="<?= ($product != null && $product->getPrice() != null) ? $product->getPrice() : "" ?>" required>
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
        <div>
            <input type="checkbox" id="home_page" name="home_page" <?= ($product != null && $product->isHomePage()) ? "checked" : "" ?>>
            <label for="home_page">Afficher sur la page d'accueil</label>
        </div>
        <input type="submit" value="enregistrer">
    </fieldset>
</form>