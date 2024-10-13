<!DOCTYPE html>
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
    <!-- [ Sidebar Menu ] start -->
    @include('components.sideNav')
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    @include('components.topNav')

    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">

            @yield('page-content')

        </div>
    </div>
    <!-- [ Main Content ] end -->

    {{-- footer --}}
    @include('components.includes.footer')


    {{-- setting --}}
    @include('components.includes.setting')

    @include('components.includes.scripts')

    @stack('sweet-alert');

</body>

<!-- [Body] end -->

</html>
