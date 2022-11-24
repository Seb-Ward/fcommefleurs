<section>
    <section class="pb-4">
        <div class="bg-white border rounded-5">
            <section class="px-4 py-5 w-100" style="background-color: #3d7546; border-radius:.5rem .5rem 0 0;">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Panier</h1>
                                                    <h6 class="mb-0 text-muted"><?= count($product_list) ?> Produit(s)</h6>
                                            </div>
                                            <hr class="my-4">
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <?php foreach ($product_list as $product) { ?>
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img class="img-fluid rounded-3" src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 clas="text-muted"><?= $product->getName() ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0"><?= $product->getPrice() ?>€</h6>
                                                </div>
                                                <hr class="my-4">
                                                <?php } ?>
                                                <div class="pt-5">
                                                    <h6 class="mb-0">
                                                        <a class="text-body" href="/shop">
                                                            <i class="fas fa-long-arrow-alt-left me-2"></i>
                                                            Retourner à la boutique
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4 bg-grey">
                                            <section class="px-4 py-5 w-100" style="background-color: #eae9e9; border-radius:.5rem .5rem .5rem .5rem;">
                                            <div class="p-5">
                                                <h2 class="fw-bold md-5 mt-2 pt-1">Récapitulatif</h2>
                                                <hr class="my-4">
                                                <div class="d-flex justify-content-between mb-4">    
                                                    <h5 class="text-uppercase">items 3</h5>
                                                    <h5>€ 132.00</h5>
                                                </div>
                                                <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase mb-3">Livraison</h5>
                                                <h5>€ 5.00</h5>   
                                                </div>
                                                <hr class="my-4">
                                                <div class="d-flex justify-content-between mb-5">    
                                                    <h5 class="text-uppercase">Total</h5>
                                                    <h5>€ 137.00</h5>
                                                </div>
                                                <button type="button" class="btn btn-warning btn-block btn-lg" data-mdb-ripple-color="dark">Passer à l'étape suivante</button>
                                            </div>
                                            </section>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </section>
            