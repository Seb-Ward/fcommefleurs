<script src="https://www.google.com/recaptcha/api.js?render=6Lc76e0iAAAAAP1NPOQdXfn769_bBu8qBGLZSFw5"></script>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters mb-5 mt-3">
                        <div class="col-md-7">
                            <h3 class="mb-4">Contactez-nous</h3>
                            <form id="contactForm" class="contactForm" method="POST" name="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="last_name">Nom*</label>
                                            <input id="last_name" class="form-control" type="text" name="last_name" placeholder="Nom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" htmlspecialchars for="first_name">Prénom*</label>
                                            <input id="first_name" class="form-control" type="text" name="first_name" placeholder="Prénom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" htmlspecialchars for="email">Email*</label>
                                            <input id="email" class="form-control" type="text" name="email" placeholder="email" required maxlength="254">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" htmlspecialchars for="phone">Téléphone</label>
                                            <input id="phone" class="form-control" type="text" name="phone" placeholder="Téléphone" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message" htmlspecialchars class="form-label">Message*</label>
                                            <textarea id="message" class="form-control" name="message" cols="30" rows="4" placeholder="Message" required maxlength="500"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="btn btn-outline-primary" type="submit" value="Envoyer message">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row mb-5 mt-3">
                                <div class="col-md-6">
                                    <div class="dbox w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text">
                                            <p>
                                                <span>Téléphone:</span>
                                                04 93 74 12 88
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dbox w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text">
                                            <p>
                                                <span>Adresse:</span>
                                                3, boulevard Wilson 06600 Antibes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="rounded" id="map"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img class="rounded mx-auto d-block" src="/assets/images/devanture_3.png" alt="photo_devanture">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>
</section>