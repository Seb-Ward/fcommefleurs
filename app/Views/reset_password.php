<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="wrap">
            <div class="sign_in_image"></div>
            <div class="login-wrap p-4 p-md-5">
                <form method="POST" id="reset_password" action="/connection/change_password">
                    <div class="form-group mt-3">
                        <h3 class="card-title text-center">Réinitialiser votre mot de passe</h3>
                    </div>
                    <div class="form-group mt-3">
                        <input class="form-control" type="password" name="new_password"
                               id="new_password" required>
                        <label class="form-control-placeholder" for="new_password">Nouveau mot de
                            passe</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="confirm_password"
                               name="confirm_password"
                               minlength="4" required>
                        <label class="form-control-placeholder" for="confirm_password">Confirmer votre
                            mot de
                            passe</label>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-outline-primary rounded px-3">Valider le mot
                            de passe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
