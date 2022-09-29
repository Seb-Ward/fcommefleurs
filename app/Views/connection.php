<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="wrap">
            <div class="sign_in_image"></div>
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign-in</h3>
                    </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <a class="text-decoration-none social-icon d-flex align-items-center justify-content-center"
                               href="#">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a class="text-decoration-none social-icon d-flex align-items-center justify-content-center"
                               href="#">
                                <i class="fa-brands fa-google"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <form action="/connection/connect" id="sign_in" method="post"><!--Here we use the $_POST method-->
                    <div class="form-group mt-3">
                        <input class="form-control" type="text" name="login" id="login" required>
                        <label class="form-control-placeholder" for="login">Login</label>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password"
                               minlength="4" required>
                        <label class="form-control-placeholder" for="password">Password (4 characters minimum):</label>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-outline-primary rounded px-3">Sign-in</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50 text-left">
                            <label class="checkbox-wrap checkbox-primary mb-0">
                                Remember me
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="#">Forgot password</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
