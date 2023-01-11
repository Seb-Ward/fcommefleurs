
<section class="pb-4">
    <div class="bg-white border rounded-5">
        <section class="px-2 py-2 w-100" style="background-color: #3d7546; border-radius:.5rem .5rem .5rem .5rem;">
            <div class="row">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5"> 
                                    <fieldset>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h1 class="fw-bold mb-0 text-black">Livraison<i class="fa-solid fa-truck ms-3"></i></h1>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check-inline">
                                                    <label for="date_picker">Quand souhaitez-vous être livré?</label>
                                                    <input id="date_picker" type="date" name="" value="">
                                                </div>
                                                <div class="form-check form-check-inline">
                                                     <input class="form-check-input" type="radio" name="slot" id="morning_slot" value="morning"/>
                                                    <label class="form-check-label" for="morning_slot">Matin</label>
                                                 </div>
                                                 <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="slot" id="afternoon_slot" value="afternoon"/>
                                                    <label class="form-check-label" for="afternoon_slot">Après-midi</label>
                                                </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                                     <h4 class="fw-bold mb-0 text-black">A qui devons nous livrer:</h4>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_woman" value="1"/>
                                                    <label class="form-check-label" for="gender_woman">Féminin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender_men" value="2"/>
                                                    <label class="form-check-label" for="gender_men">Masculin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="first_name" name="first_name" placeholder="Prénom" maxlength="15" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="last_name" name="last_name" placeholder="Nom" maxlength="15" />
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2 mt-1">
                                                     <h5 class="fw-bold mb-0 text-black">Si c'est une sociétée:</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="company_name" name="company_name" placeholder="Nom de la sociétée" maxlength="50" />
                                                 </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2 mt-3">
                                                     <h4 class="fw-bold mb-0 text-black">Oû devons-nous livrer?</h4>
                                                </div>
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                    <input type="text" id="address" name="address" placeholder="Adresse" maxlength="50"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="zipcode" name="zipcode" placeholder="Code postal" maxlength="5"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="town" name="town" placeholder="Ville" maxlength="50"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="additional_address" name="additional_address" placeholder="Complément d'adresse" maxlength="50"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" id="phone" name="phone" placeholder="Téléphone" maxlength="15"/>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="pt-5">
                                                <h6 class="mb-0">
                                                    <a class="text-body" href="/basket">
                                                        <i class="fas fa-long-arrow-alt-left me-2"></i>
                                                        Retourner au panier
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
                                        <?php foreach ($basket->getProductList() as $product) { ?> 
                                            <div class="row d-flex justify-content-between align-items-center" id="basket-product-<?= $product->getId() ?>">
                                            <div class="d-flex justify-content-between mb-4">
                                                    <img class="img-basket img-fluid rounded-3" src="data:image/<?= $product->getImageList()[0]->getType() ?>;base64,<?= base64_encode($product->getImageList()[0]->getBin()) ?>">
                                                    <h6 class="text-muted"><?= $product->getName() ?></h6>
                                                    <h6 class="mb-0"><?= $product->getPrice() ?>€</h6>
                                                </div> 
                                                <hr class="my-4">
                                            </div>
                                        <?php } ?>
                                         <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Produit(s)</h5>
                                            <h5> <?= $basket->getTTCPrice() - $basket->getShipPrice() ?>€</h5>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <h6 class="mb-0 text-black">Frais de livraison</h6>
                                            <h5> <?= $basket->getShipPrice() ?>€</h5>
                                        </div>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h4 class="fw-bold mb-0 text-black">Total</h4>
                                            <h5 class="fw-bold mb-0 text-black"><?= $basket->getTTCPrice() ?>€</h5>
                                         </div>
                                        <a href="/payment" class="btn btn-warning btn-block btn-lg" <?= count($basket->getProductList()) == 0 ? "disabled" : "" ?>>Passer à l'étape suivante<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img class="rounded mx-auto d-block" width="315px" height="235px" src="/assets/images/upload/voiture_fcommefleurs.jpg" alt="photo véhicule Fcommefleurs">
                                        </div>
                                    </div>
                                </section>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

