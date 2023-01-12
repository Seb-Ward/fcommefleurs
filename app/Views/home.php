<?php if (!empty($other_offer)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Nos offres</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
        <?php foreach ($other_offer as $product) { ?>
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
            <h5 class="card-tittle text-bottom-left text-secondary">Voir plus d'offres</h5>
        </a>
    </div>
<?php } ?>
<?php if (!empty($love_offer)) { ?>
    <section class="card shadow-sm px-2 pt-1 mb-1 w-100 border-radius .5rem .5rem .5rem .5rem" style="background-color: #F5F5F5 ">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="/assets/images/upload/rose_pour_bandeau-min.jpg" alt="" width="100%" height="310" class="w-100 rounded mx-auto d-block">
                </div>
            </div>
        </div>
        <h3 class="text-end text-gray">St Valentin</h3>
        <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
            <?php foreach ($love_offer as $product) { ?>
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
            <div class="col">
                    <div class="card shadow-sm">
                        <a href="/shop/product/">
                                <img src="/assets/images/upload/cpe_8.jpg"
                                    alt="" width="100%" height="400"
                                    class="rounded mx-auto d-block">
                        </a>
                        <div class="card-body text-center">
                            <a class="produit-name" href="/shop/product/">Plus de bouquets
                            <p class="gy-2">cliquez ici</p></a>
                        </div>
                    </div>
                </div>
            <a href="/shop/product/">
                <h5 class="btn btn-warning rounded px-3 text-darky">+ de bouquets</h5>
            </a>
        </div>
    </section>
<?php } ?>
<section>
<?php if (!empty($trendy_collection)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Nos selections du moment</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
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
            <h5 class="btn btn-warning rounded px-3 text-dark">+ de compos</h5>
            </a>
        </div>
<?php } ?>
</section>
<section>
<?php if (!empty($monthly_offer)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Offres du mois</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
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
<?php } ?>
</section>
<?php if (!empty($wedding_offer)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Mariage</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
        <?php foreach ($wedding_offer as $product) { ?>
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
            <h5 class="card-tittle text-bottom-left text-secondary">Voir plus d'offres</h5>
        </a>
    </div>
<?php } ?>
<?php if (!empty($other_offer)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Nos offres</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
        <?php foreach ($other_offer as $product) { ?>
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
            <h5 class="card-tittle text-bottom-left text-secondary">Voir plus d'offres</h5>
        </a>
    </div>
<?php } ?>
<?php if (!empty($funeral_offer)) { ?>
    <h3 class="card-title text-center text-secondary pb-2">Funérailles</h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-4 text-center">
        <?php foreach ($funeral_offer as $product) { ?>
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
            <h5 class="card-tittle text-bottom-left text-secondary">Voir plus d'offres</h5>
        </a>
    </div>
<?php } ?>
