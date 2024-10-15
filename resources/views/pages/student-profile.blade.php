@extends('layouts.common')
@section('page-content')
    @if ($data)
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
               
                <div class="card">
                    <div class="card-body py-0">
                        <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                    role="tab" aria-selected="true">
                                    <i class="ti ti-user me-2"></i>Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                    aria-selected="true">
                                    <i class="ti ti-file-text me-2"></i>Fees
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab"
                                    aria-selected="true">
                                    <i class="ti ti-id me-2"></i>Exam
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab"
                                    aria-selected="true">
                                    <i class="ti ti-lock me-2"></i>Attendance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-5" data-bs-toggle="tab" href="#profile-5" role="tab"
                                    aria-selected="true">
                                    <i class="ti ti-users me-2"></i>Documents
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-6" data-bs-toggle="tab" href="#profile-6" role="tab"
                                    aria-selected="true">
                                    <i class="ti ti-settings me-2"></i>Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="card">
                                    <div class="card-body position-relative">
                                        <div class="position-absolute end-0 top-0 p-3">
                                            <span class="badge bg-primary">Student</span>
                                        </div>
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                @if ($data->student_photo)
                                                    <img class="rounded-circle img-fluid wid-70"
                                                        src="{{ asset('storage/' . $data->student_photo) }}"
                                                        alt="User image" />
                                                @else
                                                    <img class="rounded-circle img-fluid wid-70"
                                                        src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                                        alt="User image" />
                                                @endif
                                            </div>
                                            <h5 class="mb-0">
                                                @if ($data->first_name || $data->last_name)
                                                    {{ $data->first_name . ' ' . $data->last_name }}
                                                @else
                                                    Not added yet!
                                                @endif
                                            </h5>
                                            <p class="text-muted text-sm">
                                                @if ($data->class && $data->section)
                                                    {{ 'Class - ' . $data->class . ' | Section - ' . $data->section }}
                                                @endif
                                            </p>

                                            <hr class="my-3 border border-secondary-subtle" />
                                            @if ($data->admission_no)
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-user me-2"></i>
                                                    <p class="mb-0">{{ $data->admission_no }}</p>
                                                </div>
                                            @endif
                                            @if ($data->roll_no)
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-id me-2"></i>
                                                    <p class="mb-0">{{ $data->roll_no }}</p>
                                                </div>
                                            @endif
                                            @if ($data->email)
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-mail me-2"></i>
                                                    <p class="mb-0">{{ $data->email }}</p>
                                                </div>
                                            @endif
                                            @if ($data->mobile)
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-phone me-2"></i>
                                                    <p class="mb-0">{{ $data->mobile }}</p>
                                                </div>
                                            @endif
                                            @if ($data->current_address)
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-map-pin me-2"></i>
                                                    <p class="mb-0">{{ $data->current_address }}</p>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Full Name</p>
                                                        <p class="mb-0">
                                                            @if ($data->first_name || $data->last_name)
                                                                {{ $data->first_name . ' ' . $data->last_name }}
                                                            @else
                                                                Not added yet!
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Blood Group</p>
                                                        <p class="mb-0">
                                                            @if ($data->blood_group)
                                                                {{ $data->blood_group }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Permanent Address</p>
                                                        <p class="mb-0">
                                                            @if ($data->permanent_address)
                                                                {{ $data->permanent_address }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Religion</p>
                                                        <p class="mb-0">
                                                            @if ($data->religion)
                                                                {{ $data->religion }}
                                                            @endif
                                                        </p>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Gender</p>
                                                        <p class="mb-0">
                                                            @if ($data->gender)
                                                                {{ $data->gender }}
                                                            @else
                                                                Not added yet!
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Categtory</p>
                                                        <p class="mb-0">
                                                            @if ($data->category)
                                                                {{ $data->category }}
                                                            @else
                                                                Not added yet!
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Date Of Birth</p>
                                                        <p class="mb-0">
                                                            @if ($data->dob)
                                                                {{ \Carbon\Carbon::parse($data->dob)->format('d M Y') }}
                                                            @else
                                                                Not added yet!
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Religion</p>
                                                        <p class="mb-0">
                                                            @if ($data->religion)
                                                                {{ $data->religion }}
                                                            @else
                                                                Not added yet!
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Physical Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Hieght</p>
                                                        <p class="mb-0">
                                                            @if ($data->height)
                                                                {{ $data->height }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Weight</p>
                                                        <p class="mb-0">
                                                            @if ($data->weight)
                                                                {{ $data->weight }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Medical History</p>
                                                        <p class="mb-0">
                                                            @if ($data->created_at)
                                                                {{ $data->admission_no }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Measurement Date</p>
                                                        <p class="mb-0">
                                                            @if ($data->measurement_date)
                                                                {{ \Carbon\Carbon::parse($data->measurement_date)->format('d M Y h:i A') }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Admission Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Admission Date</p>
                                                        <p class="mb-0">
                                                            @if ($data->created_at)
                                                                {{ $data->created_at->format('d M Y h:i A') }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Admission Number</p>
                                                        <p class="mb-0">
                                                            @if ($data->created_at)
                                                                {{ $data->admission_no }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Parent's Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Photo</p>
                                                        <p class="mb-0">
                                                            @if ($data->father_photo)
                                                                <img height="50" width="50"
                                                                    src="{{ asset('storage/' . $data->father_photo) }}"
                                                                    alt="Father Photo" class="img-fluid rounded">
                                                            @else
                                                                <img height="50" width="50"
                                                                    src="https://imgs.search.brave.com/RIvg_lwsUTnDwOR5KUF4d7tX8f6_L58Irn8BlWZlMmQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA3Lzc1LzcxLzEy/LzM2MF9GXzc3NTcx/MTI1M19LR25nT2hk/VE50TEcxaWp6TDNk/bEJiTDlBMkY0dkZP/bS5qcGc"
                                                                    alt="Default Father Photo" class="img-fluid rounded">
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Name</p>
                                                        <p class="mb-0">
                                                            @if ($data->father_name)
                                                                {{ $data->father_name }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Phone</p>
                                                        <p class="mb-0">
                                                            @if ($data->father_phone)
                                                                {{ $data->father_phone }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Occupation</p>
                                                        <p class="mb-0">
                                                            @if ($data->father_occupation)
                                                                {{ $data->father_occupation }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Mother Photo</p>
                                                        <p class="mb-0">
                                                            @if ($data->mother_photo)
                                                                <img height="50" width="50"
                                                                    src="{{ asset('storage/' . $data->mother_photo) }}"
                                                                    alt="Father Photo" class="img-fluid rounded">
                                                            @else
                                                                <img height="50" width="50"
                                                                    src="https://imgs.search.brave.com/RIvg_lwsUTnDwOR5KUF4d7tX8f6_L58Irn8BlWZlMmQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA3Lzc1LzcxLzEy/LzM2MF9GXzc3NTcx/MTI1M19LR25nT2hk/VE50TEcxaWp6TDNk/bEJiTDlBMkY0dkZP/bS5qcGc"
                                                                    alt="Default Father Photo" class="img-fluid rounded">
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Mother Name</p>
                                                        <p class="mb-0">
                                                            @if ($data->mother_name)
                                                                {{ $data->mother_name }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Mother Phone</p>
                                                        <p class="mb-0">
                                                            @if ($data->mother_phone)
                                                                {{ $data->mother_phone }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Mother occupation</p>
                                                        <p class="mb-0">
                                                            @if ($data->mother_occupation)
                                                                {{ $data->mother_occupation }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Guardian's Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Photo</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_photo)
                                                                <img height="50" width="50"
                                                                    src="{{ asset('storage/' . $data->guardian_photo) }}"
                                                                    alt="guardian Photo" class="img-fluid rounded">
                                                            @else
                                                                <img height="50" width="50"
                                                                    src="https://imgs.search.brave.com/RIvg_lwsUTnDwOR5KUF4d7tX8f6_L58Irn8BlWZlMmQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA3Lzc1LzcxLzEy/LzM2MF9GXzc3NTcx/MTI1M19LR25nT2hk/VE50TEcxaWp6TDNk/bEJiTDlBMkY0dkZP/bS5qcGc"
                                                                    alt="Default Father Photo" class="img-fluid rounded">
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Name</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_name)
                                                                {{ $data->guardian_name }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Relation With Guardian</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_relation)
                                                                {{ $data->guardian_relation }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Phone</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_phone)
                                                                {{ $data->guardian_phone }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Email</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_email)
                                                                {{ $data->guardian_email }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Occupation</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_occupation)
                                                                {{ $data->guardian_occupation }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Guardian Address</p>
                                                        <p class="mb-0">
                                                            @if ($data->guardian_address)
                                                                {{ $data->guardian_address }}
                                                            @endif
                                                        </p>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 text-center mb-3">
                                                <div class="user-upload wid-75">
                                                    <img src="{{ asset('assets/images/user/avatar-4.jpg') }}"
                                                        alt="img" class="img-fluid" />
                                                    <label for="uplfile" class="img-avtar-upload">
                                                        <i class="ti ti-camera f-24 mb-1"></i>
                                                        <span>Upload</span>
                                                    </label>
                                                    <input type="file" id="uplfile" class="d-none" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="Anshan" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" value="Handgun" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" value="New York" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Zip code</label>
                                                    <input type="text" class="form-control" value="956754" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Bio</label>
                                                    <textarea class="form-control">
Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience Designer based in Website, I create digital Products a more Beautiful and usable place. Morbid accusant ipsum. Nam nec tellus at.</textarea
                          >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Experience</label>
                          <select class="form-control">
                            <option>Startup</option>
                            <option>2 year</option>
                            <option>3 year</option>
                            <option selected>4 year</option>
                            <option>5 year</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h5>Social Network</h5>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="flex-grow-1 me-3">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-xs btn-light-twitter">
                              <i class="fab fa-twitter f-16"></i>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Twitter</h6>
                          </div>
                        </div>
                      </div>
                      <div class="flex-shrink-0">
                        <button class="btn btn-link-primary">Connect</button>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                      <div class="flex-grow-1 me-3">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-xs btn-light-facebook">
                              <i class="fab fa-facebook-f f-16"></i>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Facebook <small class="text-muted f-w-400">/Anshan Handgun</small></h6>
                          </div>
                        </div>
                      </div>
                      <div class="flex-shrink-0">
                        <button class="btn btn-link-danger">Remove</button>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="flex-grow-1 me-3">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-xs btn-light-linkedin">
                              <i class="fab fa-linkedin-in f-16"></i>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Linkedin</h6>
                          </div>
                        </div>
                      </div>
                      <div class="flex-shrink-0">
                        <button class="btn btn-link-primary">Connect</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5>Contact Information</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label class="form-label">Contact Phone</label>
                          <input type="text" class="form-control" value="(+99) 9999 999 999" />
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-3">
                          <label class="form-label">Email <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" value="demo@sample.com" />
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Portfolio Url</label>
                          <input type="text" class="form-control" value="https://demo.com" />
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Address</label>
                          <textarea class="form-control">3379  Monroe Avenue, Fort Myers, Florida(33912)</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end btn-page">
                                <div class="btn btn-outline-secondary">Cancel</div>
                                <div class="btn btn-primary">Update Profile</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>General Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Username <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="Ashoka_Tano_16" />
                                                    <small class="form-text text-muted">Your Profile URL:
                                                        https://pc.com/Ashoka_Tano_16</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Account Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="demo@sample.com" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Language</label>
                                                    <select class="form-control">
                                                        <option>Washington</option>
                                                        <option>India</option>
                                                        <option>Africa</option>
                                                        <option>New York</option>
                                                        <option>Malaysia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sign in Using</label>
                                                    <select class="form-control">
                                                        <option>Password</option>
                                                        <option>Face Recognition</option>
                                                        <option>Thumb Impression</option>
                                                        <option>Key</option>
                                                        <option>Pin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Advance Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="mb-1">Secure Browsing</p>
                                                        <p class="text-muted text-sm mb-0">Browsing Securely ( https ) when
                                                            it's necessary</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="form-check-input h4 position-relative m-0"
                                                            type="checkbox" role="switch" checked="" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="mb-1">Login Notifications</p>
                                                        <p class="text-muted text-sm mb-0">Notify when login attempted from
                                                            other place</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="form-check-input h4 position-relative m-0"
                                                            type="checkbox" role="switch" checked="" />
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="mb-1">Login Approvals</p>
                                                        <p class="text-muted text-sm mb-0">Approvals is not required when
                                                            login
                                                            from unrecognized devices.</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="form-check-input h4 position-relative m-0"
                                                            type="checkbox" role="switch" checked="" />
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Recognized Devices</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <p class="mb-2">Celt Desktop</p>
                                                        <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                    </div>
                                                    <div class="">
                                                        <div class="text-success d-inline-block me-2">
                                                            <i class="fas fa-circle f-10 me-2"></i>
                                                            Current Active
                                                        </div>
                                                        <a href="#!" class="text-danger"><i
                                                                class="feather icon-x-circle"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <p class="mb-2">Imco Tablet</p>
                                                        <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                    </div>
                                                    <div class="">
                                                        <div class="text-muted d-inline-block me-2">
                                                            <i class="fas fa-circle f-10 me-2"></i>
                                                            5 days ago
                                                        </div>
                                                        <a href="#!" class="text-danger"><i
                                                                class="feather icon-x-circle"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <p class="mb-2">Albs Mobile</p>
                                                        <p class="mb-0 text-muted">3462 Fairfax Drive</p>
                                                    </div>
                                                    <div class="">
                                                        <div class="text-muted d-inline-block me-2">
                                                            <i class="fas fa-circle f-10 me-2"></i>
                                                            1 month ago
                                                        </div>
                                                        <a href="#!" class="text-danger"><i
                                                                class="feather icon-x-circle"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Active Sessions</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <p class="mb-2">Celt Desktop</p>
                                                        <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                    </div>
                                                    <button class="btn btn-link-danger">Logout</button>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="me-2">
                                                        <p class="mb-2">Moon Tablet</p>
                                                        <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                    </div>
                                                    <button class="btn btn-link-danger">Logout</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn btn-outline-dark ms-2">Clear</button>
                                <button class="btn btn-primary">Update Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>New password must contain:</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i
                                                    class="ti ti-circle-check text-success f-16 me-2"></i> At least 8
                                                characters</li>
                                            <li class="list-group-item"><i
                                                    class="ti ti-circle-check text-success f-16 me-2"></i> At least 1 lower
                                                letter (a-z)</li>
                                            <li class="list-group-item"><i
                                                    class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                uppercase
                                                letter(A-Z)</li>
                                            <li class="list-group-item"><i
                                                    class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                number
                                                (0-9)</li>
                                            <li class="list-group-item"><i
                                                    class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                special
                                                characters</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end btn-page">
                                <div class="btn btn-outline-secondary">Cancel</div>
                                <div class="btn btn-primary">Update Profile</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
                        <div class="card">
                            <div class="card-header">
                                <h5>Invite Team Members</h5>
                            </div>
                            <div class="card-body">
                                <h4>5/10 <small>members available in your plan.</small></h4>
                                <hr class="my-3" />
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="email" class="form-control" />
                                                </div>
                                                <div class="col-auto">
                                                    <button class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-card">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>MEMBER</th>
                                                <th>ROLE</th>
                                                <th class="text-end">STATUS</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Addie Bass</h5>
                                                            <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">Owner</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-4.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-info">Manager</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="btn btn-link-danger">Resend</a>
                                                    <span class="badge bg-light-success">Invited</span>
                                                </td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-warning">Staff</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Addie Bass</h5>
                                                            <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">Owner</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-4.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-info">Manager</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="btn btn-link-danger">Resend</a>
                                                    <span class="badge bg-light-success">Invited</span>
                                                </td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-warning">Staff</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('images/user/avatar-1.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Addie Bass</h5>
                                                            <p class="text-muted f-12 mb-0">mareva@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">Owner</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-4.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-info">Manager</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="btn btn-link-danger">Resend</a>
                                                    <span class="badge bg-light-success">Invited</span>
                                                </td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            <img src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                                                alt="user-image" class="wid-40 rounded-circle" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">Agnes McGee</h5>
                                                            <p class="text-muted f-12 mb-0">heba@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light-warning">Staff</span></td>
                                                <td class="text-end"><span class="badge bg-success">Joined</span></td>
                                                <td class="text-end"><a href="#"
                                                        class="avtar avtar-s btn-link-secondary"><i
                                                            class="ti ti-dots f-18"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-end btn-page">
                                <div class="btn btn-link-danger">Cancel</div>
                                <div class="btn btn-primary">Update Profile</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-6" role="tabpanel" aria-labelledby="profile-tab-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Email Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="mb-4">Setup Email Notification</h6>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Email Notification</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Send Copy To Personal Email</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Updates from System Notification</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="mb-4">Email you with?</h6>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">News about PCT-themes products and feature
                                                    updates
                                                </p>
                                            </div>
                                            <div class="form-check p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Tips on getting more out of PCT-themes</p>
                                            </div>
                                            <div class="form-check p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Things you missed since you last logged into
                                                    PCT-themes</p>
                                            </div>
                                            <div class="form-check p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">News about products and other services</p>
                                            </div>
                                            <div class="form-check p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Tips and Document business products</p>
                                            </div>
                                            <div class="form-check p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Activity Related Emails</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="mb-4">When to email?</h6>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Have new notifications</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">You're sent a direct message</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Someone adds you as a connection</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <hr class="my-4 border border-secondary-subtle" />
                                        <h6 class="mb-4">When to escalate emails?</h6>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Upon new order</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">New membership approval</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <p class="text-muted mb-0">Member registration</p>
                                            </div>
                                            <div class="form-check form-switch p-0">
                                                <input class="m-0 form-check-input h5 position-relative" type="checkbox"
                                                    role="switch" checked="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end btn-page">
                                <div class="btn btn-outline-secondary">Cancel</div>
                                <div class="btn btn-primary">Update Profile</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    @endif
@endsection
