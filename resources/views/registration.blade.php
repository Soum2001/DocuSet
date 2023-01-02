@include('layouts.header')

<body class="hold-transition register-page">
    <section class="content">
        <div class="container-fluid">
            <div class="register-logo">
                <a href="../../index2.html"><b>Registration</b>Page</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form  action= "/register" id="form" method="post">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Full name" id="name" name="name" value="{{$name}}" autocomplete="off" readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$email}}" readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="position" id="position" name="position" value="{{$position}}" readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Address</h4>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="address1" id="address1" name="address1">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-landmark"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="address2" id="address2" name="address2">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-landmark"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="City" id="city" name="city">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-city"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="State" id="state" name="state">
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
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="primary contact" id="phone_no1" name="phone_no1">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="secondary contact" id="phone_no2" name="phone_no2">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Zip" id="zip" name="zip">
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
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Confirm Password" id="re_password" name="re_password">
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
                    </form>
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
    @include('layouts.footer')
    <script src="{{asset('assets/js/datatable.js')}}"></script>
</body>

</html>