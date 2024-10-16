@extends('layouts.common-table')

@if ($key == 'studentDetails')
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
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="filterStudentSection" class="form-label fw-bold">Section:</label>
                            <select id="filterStudentSection" class="form-select shadow-sm">
                                <option value="all">Select</option>
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
                <td>{{ $row->class . ' ' . '()' . $row->section }}</td>

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
