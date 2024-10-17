@extends('layouts.common-table')
@section('card-header')
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class="mb-3 mb-sm-0">Classes list</h5>
        <div>
            <button data-pc-animate="blur" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#animateModal">
                Add Class
            </button>
        </div>
    </div>
@endsection
@section('table-row')
    @foreach ($tableRow as $count => $row)
        <tr>
            <td>{{ $count + 1 }}</td>
            <td>{{ $row->class_name }}</td>
            <td>
                @isset($row->getAuthor->name)
                    {{ $row->getAuthor->name }}
                @else
                    Not found
                @endisset
            </td>
            <td>{{ $row->created_at->format('d M Y h:i A') }}</td>
            <td>{{ $row->updated_at->format('d M Y h:i A') }}</td>
            <td>
                <a href="">
                    <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="View">
                        <i class="ti ti-eye f-20"></i>
                    </button>
                </a>
                <a href="">
                    <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Edit">
                        <i class="ti ti-edit f-20"></i>
                    </button>
                </a>
                <button type="button" value="{{ $row->id }}"
                    class="avtar avtar-xs btn btn-link-secondary deleteClassBtn" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Fees">
                    <i class="ti ti-trash f-20"></i>
                </button>
            </td>

        </tr>
    @endforeach
@endsection

@section('modal-content')
    <div class="modal fade modal-animate" id="animateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="className" placeholder="Enter class name...">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveClassInsert" class="btn btn-primary shadow-2">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('ajax')
    <script>
        // insert class
        $(document).on("click", "#saveClassInsert", function() {
            const class_name = $("#className").val();
            let tableBody = ""
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ajax.create.class') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    class_name: class_name,
                },
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message, 'Success');

                        loadClassesTable(response.classes);
                        $("#className").val("");
                        // $("#animateModal").modal("hide");
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {

                        const errors = xhr.responseJSON.errors;

                        $.each(errors, function(key, value) {
                            toastr.error(value[0],
                                'Validation Error');
                        });
                    } else {
                        toastr.error('An unexpected error occurred.', 'Error');
                    }
                }
            });
        });

        // deletet class
        $(document).on("click", ".deleteClassBtn", function() {
            const class_id = $(this).val();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.ajax.delete.class') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            class_id: class_id
                        },
                        success: function(response) {
                            toastr.error(response.message);
                            loadClassesTable(response.classes);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON)
                        }
                    });
                }
            });
        })

        // function for load class
        function loadClassesTable(classes) {
            classes.forEach((element, index) => {
                const createdAt = moment(element.created_at).format(
                    'DD MMM YYYY hh:mm A');
                const updatedAt = moment(element.updated_at).format(
                    'DD MMM YYYY hh:mm A');
                tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${element.class_name}</td>
                                <td>${element.author ? element.author.name : 'Not found'}</td>
                                <td>${createdAt}</td>
                                <td>${updatedAt}</td>
                                <td>
                                <a href="">
                                    <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="View">
                                        <i class="ti ti-eye f-20"></i>
                                    </button>
                                </a>
                                <a href="">
                                    <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit">
                                        <i class="ti ti-edit f-20"></i>
                                    </button>
                                </a>
                                <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Fees">
                                    <i class="ti ti-cash f-20"></i>
                                </button>
                            </td>
                            </tr>`;
            });


            // Replace table body content
            $("#tableBody").html(tableBody);
        }
    </script>
@endpush
