@extends('layouts.common-table')

@if ($key == 'studentDetails')
    @section('card-header')
        <h4>Student List</h4>
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
                <td>{{ $row->category }}</td>
                <td>{{ $row->mobile }}</td>
                <td>
                    <a href="{{ route('admin.student.profile', $row->id) }}">
                        <button type="button" class="avtar avtar-xs btn btn-link-secondary" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="View">
                            <i class="ti ti-eye f-20"></i>
                        </button>
                    </a>
                    <a href="{{ route('admin.update.student.details', $row->id) }}">
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

            </tr>
        @endforeach
    @endsection
@endif
@push('ajax')
    <script>
        $(document).on("change", "#filterStudentClass", function() {
            let optionField = "";
            const class_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.ajax.student.filter.class') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    class_id,
                },
                success: function(response) {

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
                error: function(xhr) {
                    toastr.error('An unexpected error occurred.', 'Error');
                    console.log(xhr);
                }
            });
        })

        $(document).on("change", "#filterStudentClass", function() {
            const class_id = $("#filterStudentClass").val();
            const section_id = $("#filterStudentSection").val();
            if (class_id == 'all') {
                location.reload();
            }
        })
        // now filter student according to class and section
        $(document).on("change", "#filterStudentSection", function() {
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
                success: function(response) {
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
                <td>${element.category}</td>
                <td>${element.mobile}</td>
                <td>
                    <a href="/student/profile/${element.id}">
                        <button type="button" class="avtar avtar-xs btn btn-link-secondary" 
                            data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                            <i class="ti ti-eye f-20"></i>
                        </button>
                    </a>
                    <a href="/student/profile/edit/${element.id}">
                        <button type="button" class="avtar avtar-xs btn btn-link-secondary" 
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                            <i class="ti ti-edit f-20"></i>
                        </button>
                    </a>
                    <button type="button" class="avtar avtar-xs btn btn-link-secondary" 
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Fees">
                        <i class="ti ti-cash f-20"></i>
                    </button>
                </td>
            </tr>
        `;
            });

            $("#tableBody").html(tableBody);
        }
    </script>
@endpush
