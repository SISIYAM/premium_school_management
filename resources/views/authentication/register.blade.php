<!doctype html>
<html lang="en">
@include('components.includes.head')

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v2">
            <div class="auth-sidecontent">
                <img src="{{ asset('assets/images/authentication/img-auth-sideimg.jpg') }}" alt="images"
                    class="img-fluid img-auth-side" />
            </div>
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#"><img src="{{ asset('assets/images/logo-dark.svg') }}"
                                    alt="img" /></a>
                            <div class="d-grid my-3">
                                <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="{{ asset('assets/images/authentication/facebook.svg') }}"
                                        alt="img" /> <span>
                                        Sign In with Facebook</span>
                                </button>
                                <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="{{ asset('assets/images/authentication/twitter.svg') }}" alt="img" />
                                    <span> Sign
                                        In with Twitter</span>
                                </button>
                                <button type="button" class="btn mt-2 btn-light-primary bg-light text-muted">
                                    <img src="{{ asset('assets/images/authentication/google.svg') }}" alt="img" />
                                    <span> Sign
                                        In with Google</span>
                                </button>
                            </div>
                        </div>
                        <div class="saprator my-3">
                            <span>OR</span>
                        </div>
                        <h4 class="text-center f-w-500 mb-3">Login with your email</h4>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" />
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="floatingInput1" placeholder="Password" />
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                    checked="" />
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                            </div>
                            <h6 class="text-secondary f-w-400 mb-0">
                                <a href="forgot-password-v2.html"> Forgot Password? </a>
                            </h6>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="button" class="btn btn-primary">Login</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                            <a href="register-v2.html" class="link-primary">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.includes.scripts')

</body>
<!-- [Body] end -->

</html>