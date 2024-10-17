@extends('layouts.common-table')

@section('card-header')
    <h4>
        Disabled Student List</h4>
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
                <td>${element.status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Disabled</span>' }</td>
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
