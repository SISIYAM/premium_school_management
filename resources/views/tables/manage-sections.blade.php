@extends('layouts.common-table')
@section('card-header')
    <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class="mb-3 mb-sm-0">Sections list</h5>
        <div>
            <button data-pc-animate="blur" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#animateModal">
                Add Sections
            </button>
        </div>
    </div>
@endsection
@section('table-row')
    @foreach ($tableRow as $count => $row)
        <tr>
            <td>{{ $count + 1 }}</td>
            <td>{{ $row->getClass->class_name }}</td>
            <td>{{ $row->section_name }}</td>
            <td>
                @isset($row->getClass->getAuthor->name)
                    {{ $row->getClass->getAuthor->name }}
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
                    class="avtar avtar-xs btn btn-link-secondary deleteSectionBtn" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Delete">
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
                    <h5 class="modal-title">Add Sections</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="my-2">
                        <label class="form-label" for="classID">Select Class</label>
                        <select class="form-select" id="classID" name="class_id">
                            <option value="">Select</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-2">
                        <label class="form-label" for="sectionName">Section</label>
                        <input type="text" class="form-control" id="sectionName" name="section_name"
                            placeholder="Enter section name...">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveSectionInsert" class="btn btn-primary shadow-2">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('ajax')
    <script>
        // insert class
        $(document).on("click", "#saveSectionInsert", function() {
            const class_id = $("#classID").val();
            const section_name = $("#sectionName").val();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.ajax.create.section') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    class_id,
                    section_name,
                },
                success: function(response) {
                    if (response.status) {
                        // $("#animateModal").modal("hide");
                        toastr.success(response.message, 'Success');
                        console.log(response);
                        sectionTable(response.sections);
                        $("#sectionName").val("");

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
        $(document).on("click", ".deleteSectionBtn", function() {
            const section_id = $(this).val();
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
                        url: "{{ route('admin.ajax.delete.section') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            section_id: section_id
                        },
                        success: function(response) {
                            toastr.error(response.message);
                            sectionTable(response.sections);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON)
                        }
                    });
                }
            });
        })

        // function for load class
        function sectionTable(sections) {
            let tableBody = ""
            sections.forEach((element, index) => {
                const createdAt = moment(element.created_at).format(
                    'DD MMM YYYY hh:mm A');
                const updatedAt = moment(element.updated_at).format(
                    'DD MMM YYYY hh:mm A');
                tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${element.get_class.class_name}</td>
                                <td>${element.section_name}</td>
                                <td>${element.get_class.get_author.name ? element.get_class.get_author.name : 'Not found'}</td>
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
                                <button type="button" value="${element.id}" class="avtar avtar-xs btn btn-link-secondary deleteSectionBtn" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete">
                                    <i class="ti ti-trash f-20"></i>
                                </button>
                            </td>
                            </tr>`;
            });


            // Replace table body content
            $("#tableBody").html(tableBody);
        }
    </script>
@endpush
