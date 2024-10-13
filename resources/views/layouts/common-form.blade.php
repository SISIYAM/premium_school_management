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
                    @yield('form-body')
                </div>
            </div>
        </div>
    </div>
@endsection
@if (Session::has('success'))
    @push('sweet-alert')
        <script>
            Swal.fire({
                icon: "{{ Session::get('icon') }}",
                title: "{{ Session::get('title') }}",
                text: "{{ Session::get('success') }}"

            });
        </script>
    @endpush
@endif
