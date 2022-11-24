    <h3><?= $description ?? "" ?></h3>
    <div class="row row-cols-1 row-cols-md-3 mb-5 g-5 text-center">
        <?php foreach ($product_list as $product) { ?>
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
    </div>