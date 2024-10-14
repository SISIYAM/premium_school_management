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
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <a href="#"><img src="{{ asset('assets/images/logo-dark.svg') }}"
                                        alt="img" /></a>

                            </div>
                            <div class="saprator my-3">

                            </div>
                            <h4 class="text-center f-w-500 mb-3">Login with your email</h4>
                            <div class="mb-3">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                    id="floatingInput" placeholder="Email Address" />
                                @error('email')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password')
                                        is-invalid
                                    @enderror""
                                    id="floatingInput1" placeholder="Password" />
                                @error('password')
                                    <div class="text-danger m-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('components.includes.scripts')

</body>
<!-- [Body] end -->

</html>
