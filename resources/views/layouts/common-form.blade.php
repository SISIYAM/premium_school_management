@extends('layouts.common')
@section('page-content')
    @isset($header)
        <div class="text-center d-flex justify-content-center align-items-center" style="height: 80px;">
            <h2 class="mb-0">{{ $header }}</h2>
        </div>
    @endisset
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('form-body')
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @if (Session::has('success'))
    @push('sweet-alert')
        <script>
            Swal.fire({
                icon: "{{ Session::get('icon') }}",
                title: "{{ Session::get('title') }}",
                text: "{{ Session::get('success') }}"

            });
        </script>
    @endpush
@endif --}}

@if (Session::has('success'))
    @push('toast')
        <script>
            window.onload = function() {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                let icon = "{{ Session::get('icon', 'success') }}";
                let title = "{{ Session::get('title', 'Success') }}";
                let message = "{{ Session::get('success') }}";


                if (icon === 'success') {
                    toastr.success(message, title);
                } else if (icon === 'error') {
                    toastr.error(message, title);
                } else if (icon === 'warning') {
                    toastr.warning(message, title);
                } else if (icon === 'info') {
                    toastr.info(message, title);
                } else {
                    toastr.success(message, title);
                }
            };
        </script>
    @endpush
@endif
