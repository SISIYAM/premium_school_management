<!doctype html>
<html lang="en">
<!-- [Head] start -->
@include('components.includes.head')
<!-- [Head] end -->

<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">

    <!-- [ Main Content ] start -->
    <div class="maintenance-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card error-card">
                        <div class="card-body">
                            <div class="error-image-block">
                                <img class="img-fluid" src="{{ asset('assets/images/pages/img-error-404.svg') }}"
                                    alt="Forbidden Access" />
                            </div>
                            <div class="text-center">
                                <h1 class="mt-5"><b>403 Forbidden</b></h1>
                                <p class="mt-2 mb-4 text-muted">
                                    Sorry, you don't have permission to access this page.
                                    If you believe this is an error, please contact the administrator.
                                </p>
                                <a href="javascript:history.back()" class="btn btn-secondary mb-3 me-2">Go Back</a>
                                <a href="/" class="btn btn-primary mb-3">Go to Home</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('components.includes.scripts')
</body>
<!-- [Body] end -->

</html>