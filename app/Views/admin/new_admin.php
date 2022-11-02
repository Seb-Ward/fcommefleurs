<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="wrap">
            <div class="sign_in_image"></div>
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Nouvelle Administrateur</h3>
                    </div>
                </div>
                <form action="/connection/connect/" id="new_admin" method="post"><!--Here we use the $_POST method-->
                    <div class="form-group mt-3">
                        <input class="form-control" type="text" name="firstname_admin" id="firstname_admin" required>
                        <label class="form-control-placeholder" for="firstname_admin">Prénom*</label>
                    </div>
                    <div class="form-group mt-3">
                        <input class="form-control" type="text" name="lastname_admin" id="lastname_admin" required>
                        <label class="form-control-placeholder" for="lastname_admin">Nom*</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password"
                               minlength="4" required>
                        <label class="form-control-placeholder" for="password">Mot de passe (4 characters minimum):*</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password"
                               minlength="4" required>
                        <label class="form-control-placeholder" for="password">Confirmer Mot de passe:*</label>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-outline-primary rounded px-3">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
