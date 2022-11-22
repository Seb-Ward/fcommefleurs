<div class="py-4">
    <h4 class="card-title text-center text-secondary">Notre selection du moment</h4>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-5 text-center">
        <?php foreach ($trendy_collection as $product) { ?>
            <div class="col">
                <div class="card shadow-sm">
                    <a href="/shop/product/<?= $product->getId() ?>">
                        <?php if (!empty($product->getImageList())) { ?>
                            <img src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>"
                                 alt="<?= $product->getDescription() ?>" width="100%" height="400"
                                 class="rounded mx-auto d-block">
                        <?php } else { ?>
                            <i class="fa-regular fa-image"></i>
                        <?php } ?>
                    </a>
                    <div class="card-body text-center">
                        <a class="produit-name" href="/shop/product/<?= $product->getId() ?>"><?= $product->getName() ?></a>
                        <p class="gy-2"><?= str_replace(".", ",", $product->getPrice()) ?> &euro;</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="/shop">
        <h5 class="card-tittle text-bottom-left text-secondary">Voir plus de selections du moment</h5>
    </a>
    </div>
    <h4 class="card-title text-center text-secondary">Offres du mois</h4>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-5 text-center">
        <?php foreach ($monthly_offer as $product) { ?>
            <div class="col">
                <div class="card shadow-sm">
                    <a href="/shop/product/<?= $product->getId() ?>">
                        <?php if (!empty($product->getImageList())) { ?>
                            <img src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>"
                                 alt="<?= $product->getDescription() ?>" width="100%" height="400"
                                 class="rounded mx-auto d-block">
                        <?php } else { ?>
                            <i class="fa-regular fa-image"></i>
                        <?php } ?>
                    </a>
                    <div class="card-body text-center">
                        <a class="produit-name" href="/shop/product/<?= $product->getId() ?>"><?= $product->getName() ?></a>
                        <p class="gy-2"><?= str_replace(".", ",", $product->getPrice()) ?> &euro;</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="/shop">
        <h5 class="card-tittle text-bottom-left text-secondary">Voir plus d'offres du mois</h5>
    </a>
    </div>
</div>
        