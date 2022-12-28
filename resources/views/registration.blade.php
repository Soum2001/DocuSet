@include('layouts.header')

<body class="hold-transition register-page">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="register-logo">
                    <a href="../../index2.html"><b>Registration</b>Page</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Full name" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Position applied for" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Address</h4>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="address1" id="name" name="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-landmark"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="address2" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-landmark"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="City" id="name" name="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-city"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="State" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-state"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Phone Number</h4>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="primary contact" id="name" name="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="secondary contact" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Zip" id="name" name="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <h4>Password</h4>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Password" id="name" name="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Confirm Password" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" id="register" name="register">Register</button>
                        </div>
                    </div>
                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Sign up using Google+
                        </a>
                    </div>
                    <a href="login.html" class="text-center">I already have a membership</a>
                </div>

            </div>

        </div>

        </div>

    </section>
    </div>
</body>