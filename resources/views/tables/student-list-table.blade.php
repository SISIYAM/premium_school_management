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
                            <label for="filterOption" class="form-label fw-bold">Class:</label>
                            <select id="filterOption" class="form-select shadow-sm">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="sectionOption" class="form-label fw-bold">Section:</label>
                            <select id="sectionOption" class="form-select shadow-sm">
                                <option value="all">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-2">
                            <button id="applyFilter" class="btn btn-primary w-100">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('table-row')
        @foreach ($tableRow as $count => $row)
            <tr>
                <td>{{ $count + 2405281355 }}</td>
                <td>MD SAYMUM ISLAM SIYAM</td>
                <td>12213119</td>
                <td>Class 1 (A)</td>

                <td>Male</td>
                <td>Physical Disabled</td>
                <td>01722146631</td>
                <td>
                    <!-- Buttons with icons and Bootstrap tooltips -->
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="View">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Fees">
                        <i class="fas fa-money-bill-wave"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    @endsection
@endif
