@extends('layouts.common-table')

@section('card-header')
<div class="d-sm-flex align-items-center justify-content-between">
    <h5 class="mb-3 mb-sm-0">Behaviour Incident</h5>
    <div>
        <button data-pc-animate="blur" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#animateModal">
            Add Class
        </button>
    </div>
</div>
@endsection
@section('filter-section')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Select Criteria</h4>
        </div>
        <!-- New Filter Section -->
        <div class="card-body">
            <div class="row mb-3 d-flex justify-content-center">
                <div class="col-sm-4">
                    <label for="filterStudentClass" class="form-label fw-bold">Class:</label>
                    <select id="filterStudentClass" class="form-select shadow-sm">
                        <option value="all">All</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="filterStudentSection" class="form-label fw-bold">Section:</label>
                    <select id="filterStudentSection" class="form-select shadow-sm">
                        <option value="all">First Select a class</option>

                    </select>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-center">
                <div class="col-sm-2">
                    <button id="applyFilter" class="btn btn-primary w-100">Apply Filter</button>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@section('table-row')
@foreach ($tableRow as $count => $row)
    <tr>
        <td>{{ $row->admission_no }}</td>
        <td>
            @if ($row->status)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Disabled</span>
            @endif
        </td>
        <td>{{ $row->first_name . ' ' . $row->last_name }}</td>
        <td>{{ $row->roll_no }}</td>
        <td>
            @if ($row->getClass)
                {{ $row->getClass->class_name }}
            @else
                <span class="text-danger">Class not found</span>
            @endif

            @if ($row->getSection)
                ({{ $row->getSection->section_name }})
            @else
                <span class="text-danger">(Section not found)</span>
            @endif
        </td>



        <td>{{ $row->gender }}</td>
        <td>{{ $row->mobile }}</td>
        <td>10</td>
        <td>


            <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="modal"
                data-bs-target=".bd-add-modal-lg">
                <i class="ti ti-plus f-20"></i>
            </button>

            <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="modal"
            data-bs-target="#exampleModalFullscreen">
                <i class="ti ti-menu f-20"></i>
            </button>
        </td>

    </tr>
@endforeach
@endsection


<!-- Modal -->
@section('modal-content')
<div class="modal fade bd-add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="addIncidents" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="addIncidents">Assign Incident</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                @for ($i = 0; $i <= 5; $i++)
                    <div class="alert alert-secondary" role="alert">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Lorem ipsum dolor sit.</h6>
                            <div class="points">
                                Points-10
                                <input type="checkbox" name="point" id="points" value="10">
                            </div>
                        </div>
                        <p>
                            A simple secondary alert with an example link Give it a click if you like.
                        </p>

                    </div>
                @endfor

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Full screen modal </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body ">
                <div class="dt-responsive table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered nowrap w-100">
                        <thead>
                            <tr>

                                <th>Title </th>
                                <th>Point </th>
                                <th>Date </th>
                                <th>Description </th>
                                <th>Assign By </th>
                                <th>Action </th>


                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <td>Lorem ipsum dolor sit amet.</td>
                                <td>20</td>
                                <td>20 Jun</td>
                                <td>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, laboriosam.
                                </td>
                                <td>Evan</td>
                                <td>

                                    <button type="button" class="avtar avtar-xs btn btn-link-secondary"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="ti ti-trash f-20"></i>
                                    </button>


                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>

        </div>
    </div>
</div>


@endsection

@push('ajax')
    <script>
        $(document).on("change", "#filterStudentClass", function () {
            let optionField = "";
            const class_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ajax.student.filter.class') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    class_id,
                },
                success: function (response) {

                    if (response.status) {
                        optionField += `<option value="">Select Section</option>`;
                        response.sections.forEach(element => {
                            optionField +=
                                `<option value="${element.id}">${element.section_name}</option>`;
                        });
                        optionField += `<option value="all">All</option>`;
                    } else {
                        optionField += `<option value="">Select Section</option>`;
                        optionField += `<option value="all">All</option>`;
                        optionField += "<option>No sections found for the selected class.</option>";
                    }
                    $("#filterStudentSection").html(optionField);
                },
                error: function (xhr) {
                    toastr.error('An unexpected error occurred.', 'Error');
                    console.log(xhr);
                }
            });
        })

        $(document).on("change", "#filterStudentClass", function () {
            const class_id = $("#filterStudentClass").val();
            const section_id = $("#filterStudentSection").val();
            if (class_id == 'all') {
                location.reload();
            }
        })
        // now filter student according to class and section
        $(document).on("change", "#filterStudentSection", function () {
            const class_id = $("#filterStudentClass").val();
            const section_id = $("#filterStudentSection").val();


            $.ajax({
                type: "POST",
                url: "{{ route('admin.ajax.student.list.filter') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    class_id,
                    section_id,
                },
                success: function (response) {
                    console.log(response);
                    loadStudentTable(response.students)
                }
            });
        })

        // function for re render student table
        function loadStudentTable(students) {
            let tableBody = "";
            students.forEach(element => {
                tableBody += `
                                    <tr>
                                        <td>${element.admission_no}</td>
                                        <td>${element.status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Disabled</span>'}</td>
                                        <td>${element.first_name} ${element.last_name}</td>
                                        <td>${element.roll_no}</td>
                                        <td>
                                            ${element.get_class ? element.get_class.class_name :
                        '<span class="text-danger">Class not found</span>'}
                                            ${element.get_section ?
                        `(${element.get_section.section_name})` :
                        '<span class="text-danger">(Section not found)</span>'}
                                        </td>
                                        <td>${element.gender}</td>
                                        <td>${element.mobile}</td>
                                        <td>10</td>
                                        <td>
                                             <button type="button" class="avtar avtar-xs btn btn-link-secondary" 
                                                    data-pc-animate="blur" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#animateModal">
                                                    <i class="ti ti-plus f-20"></i>
                                                </button>

                                            <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Fees">
                                                <i class="ti ti-menu f-20"></i>
                                            </button>
                                        </td>
                                    </tr>
                                `;
            });

            $("#tableBody").html(tableBody);
        }
    </script>
@endpush