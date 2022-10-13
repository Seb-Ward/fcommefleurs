<div class="row title-listing">
    <div class="col-md-6">
        <h3>Listing</h3>
    </div>
    <div class="col-md-6 text-end">
        <a class='btn btn-outline-primary' href="/product/edit">Ajouter un nouveau produit</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="product_table">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Nom du produit</th>
            <th>Prix TTC</th>
            <th>Quantité</th>
            <th>Selection du moment</th>
            <th>Offre du mois</th>
            <th>Visibilité</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product_list as $product) { ?>
            <tr id="product_<?= $product->getId() ?>">

                <td class="image_product">
                    <?php if (!empty($product->getImageList())) { ?>
                        <img src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>" alt="<?= $product->getDescription() ?>" width="100" height="100" class="rounded mx-auto d-block">
                    <?php } else { ?>
                        <i class="fa-regular fa-image"></i>
                    <?php } ?>
                </td>
                <td><?= $product->getName() ?></td>
                <td><?= str_replace(".", ",", $product->getPrice()) ?> &euro;</td>
                <td><?= $product->getQuantity() != null && $product->getQuantity() >= 0 ? $product->getQuantity() : 'Illimité <i class="fa-solid fa-infinity"></i>' ?></td>
                <td><?= $product->isTrendyCollection() ? "Oui" : "Non" ?></td>
                <td><?= $product->isMonthlyOffer() ? "Oui" : "Non" ?></td>
                <td><?= $product->isHomePage() ? "Accueil" : "Boutique" ?></td>
                <td>
                    <a class="btn btn-primary" href="/product/edit/<?= $product->getId() ?>"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn btn-danger product-remove" data-id="<?= $product->getId() ?>"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>