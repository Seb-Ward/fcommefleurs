<div class="row">
    <div class="col-lg-7 pt-4 order-2 order-lg-1">
        <div class="row">
            <div class="d-none d-md-block col-md-2 pe-0">
                <div class="owl-thumbs" data-slider-id="1">
                    <?php foreach ($product->getImageList() as $image) { ?>
                        <img src="data:image/<?= $image->getType() ?>;base64,<?= base64_encode($image->getBin()) ?>"
                             alt="<?= $product->getDescription() ?>" width="100%" height="auto"
                             class="img-fluid rounded mx-auto d-block mb-2">
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-10 detail-carousel">
                <?php if (!empty($product->getImageList())) { ?>
                    <img src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>"
                         alt="<?= $product->getDescription() ?>" width="400" height="400"
                         class="rounded mx-auto d-block">
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-xl-4 pt-4 order-1 order-lg-2 ps-lg-4">
        <div class="sticky-top" style="top:100px">
            <h1 class="h2 mb-4"><?= $product->getName() ?></h1>
            <div class="row">
                    <p class="mb-4 text-muted"><?= $product->getDescription() ?></p>
                </div>

            <div class="d-flex flex-column flex-sm-row align-items-sm-center mb-4 ">
                <form>
                    <div class="form-group row mb-4">
                        <span class="h4 mt-2"><?= $product->getPrice() ?>€</span>
                        <label class="col-sm-3 col-form-label " for="quantity">Quantité:
                        </label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="quantity" id="quantity">
                        </div>
                        <div>
                            <small id="emailHelp" class="form-text text-muted">Frais de livraison fixes : 9,95 €
                            </small>
                        </div>
                        <a class="btn btn-primary me-5" href="/contact">Commander</a>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>