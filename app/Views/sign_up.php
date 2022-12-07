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
                        <li class="active">Account Setup</li>
                        <li>Social Profiles</li>
                        <li>Personal Details</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h4 class="fs-title">Create your account</h4>
                        <h5 class="fs-subtitle">This is step 1</h5>
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
                        <h4 class="fs-title">Social Profiles</h4>
                        <h5 class="fs-subtitle">Your presence on the social network</h5>
                        <input type="text" name="twitter" placeholder="Twitter" />
                        <input type="text" name="facebook" placeholder="Facebook" />
                        <input type="text" name="gplus" placeholder="Google Plus" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h4 class="fs-title">Personal Details</h4>
                        <h5 class="fs-subtitle">We will never sell it</h5>
                        <input type="text" name="fname" placeholder="First Name" />
                        <input type="text" name="lname" placeholder="Last Name" />
                        <input type="text" name="phone" placeholder="Phone" />
                        <textarea name="address" placeholder="Address"></textarea>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <div class="form-group">
                            <button class="form-control btn btn-outline-primary rounded px-3 submit action-button" type="submit">S'inscrire</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

