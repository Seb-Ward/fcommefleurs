<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="wrap">
            <div class="sign_in_image"></div>
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Inscription</h3>
                    </div>
                </div>
                <form action="/sign_up/save_customer/" id="sign_up" method="post">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Etape 1</li>
                        <li>Etape 2</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h4 class="fs-title">Créez votre compte</h4>
                        <h5 class="fs-subtitle">Etape 1</h5>
                        <div class="form-group mt-3">
                            <input class="form-control" type="text" name="email" id="email" required>
                            <label class="form-control-placeholder" for="email">Entrez votre email</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" id="password" name="password" minlength="4" required>
                            <label class="form-control-placeholder" for="password">Entrez un mot de passe (4 characters minimum):*</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="4" required>
                            <label class="form-control-placeholder" for="confirm_password">Confirmez votre mot de passe, svp:*</label>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h4 class="fs-title">Informations complémentaires</h4>
                        <h5 class="fs-subtitle">Etape 2 (optionnel)</h5>
                        <div class="mb-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_woman" value="1"/>
                                <label class="form-check-label" for="gender_woman">Féminin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_men" value="2"/>
                                <label class="form-check-label" for="gender_men">Masculin</label>
                            </div>
                            <input type="text" name="first_name" placeholder="Prénom" maxlength="15" />
                            <input type="text" name="last_name" placeholder="Nom" maxlength="15" />
                            <p>Ou:</p>
                            <input type="text" name="Company_name" placeholder="Nom de sociétée" maxlength="50" />
                        </div>
                        <input type="text" name="phone" placeholder="Téléphone" maxlength="15"/>
                        <input type="text" name="address" placeholder="Adresse" maxlength="50"/>
                        <input type="text" name="zipcode" placeholder="Code postal" maxlength="5"/>
                        <input type="text" name="town" placeholder="Ville" maxlength="50"/>
                        <input type="text" name="additional_address" placeholder="Complément d'adresse" maxlength="50"/>
                        <input type="button" name="previous" class="previous action-button" value="Précédent" />
                        <input class="form-control btn btn-outline-primary rounded px-3 submit action-button" type="submit" value="S'inscrire">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

