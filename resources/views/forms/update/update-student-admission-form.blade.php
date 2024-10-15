@extends('layouts.common-form', ['header' => 'Student Registration Form'])
@section('form-body')
    @if (empty($data))
        <div class="alert alert-danger">Not Found!</div>
    @else
        <form action="{{ route('execute.student.details') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" id="">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Personal Details</h5>
                    <hr>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text"
                            class="form-control @error('first_name')
                    is-invalid
                @enderror"
                            id="first_name" name="first_name" value="{{ old('first_name', $data->first_name) }}"
                            placeholder="Enter first name" />
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            name="last_name" value="{{ old('last_name', $data->last_name) }}"
                            placeholder="Enter last name" />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="roll_no" class="form-label">Roll Number</label>
                        <input type="text" class="form-control @error('roll_no') is-invalid @enderror" id="roll_no"
                            name="roll_no" value="{{ old('roll_no', $data->roll_no) }}" placeholder="Enter Roll Number" />
                        @error('roll_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', $data->gender) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('gender', $data->gender) == 'female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="other" {{ old('gender', $data->gender) == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                            name="dob" value="{{ old('dob', $data->dob) }}" />
                        @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="religion" class="form-label">Religion</label>
                        <input type="text" class="form-control @error('religion') is-invalid @enderror" id="religion"
                            name="religion" value="{{ old('religion', $data->religion) }}" placeholder="Enter religion" />
                        @error('religion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-select @error('category') is-invalid @enderror" name="category">
                            <option value="">Select Category</option>
                            <option value="General" {{ old('category', $data->category) == 'General' ? 'selected' : '' }}>
                                General</option>
                            <option value="OBC" {{ old('category', $data->category) == 'OBC' ? 'selected' : '' }}>OBC
                            </option>
                            <option value="SC/ST" {{ old('category', $data->category) == 'SC/ST' ? 'selected' : '' }}>
                                SC/ST</option>
                            <option value="Physically Challenged"
                                {{ old('category', $data->category) == 'Physically Challenged' ? 'selected' : '' }}>
                                Physically Challenged
                            </option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <select id="class" class="form-select @error('class') is-invalid @enderror" name="class">
                            <option value="">Select Class</option>
                            <option value="1" {{ old('class', $data->class) == '1' ? 'selected' : '' }}>Class 1
                            </option>
                            <option value="2" {{ old('class', $data->class) == '2' ? 'selected' : '' }}>Class 2
                            </option>
                            <option value="3" {{ old('class', $data->class) == '3' ? 'selected' : '' }}>Class 3
                            </option>
                        </select>
                        @error('class')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select id="section" class="form-select @error('section') is-invalid @enderror" name="section">
                            <option value="">Select Section</option>
                            <option value="A" {{ old('section', $data->section) == 'A' ? 'selected' : '' }}>A
                            </option>
                            <option value="B" {{ old('section', $data->section) == 'B' ? 'selected' : '' }}>B
                            </option>
                        </select>
                        @error('section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                            name="mobile" value="{{ old('mobile', $data->mobile) }}"
                            placeholder="Enter mobile number" />
                        @error('mobile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $data->email) }}" placeholder="Enter email" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="admission_date" class="form-label">Admission Date</label>
                        <input type="date" class="form-control @error('admission_date') is-invalid @enderror"
                            id="admission_date" name="admission_date"
                            value="{{ old('admission_date', $data->admission_date) }}" />
                        @error('admission_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="blood_group" class="form-label">Blood Group</label>
                        <select id="blood_group" class="form-select @error('blood_group') is-invalid @enderror"
                            name="blood_group">
                            <option value="">Select Blood Group</option>
                            <option value="A+" {{ old('blood_group', $data->blood_group) == 'A+' ? 'selected' : '' }}>
                                A+</option>
                            <option value="A-" {{ old('blood_group', $data->blood_group) == 'A-' ? 'selected' : '' }}>
                                A-</option>
                            <option value="B+" {{ old('blood_group', $data->blood_group) == 'B+' ? 'selected' : '' }}>
                                B+</option>
                            <option value="B-" {{ old('blood_group', $data->blood_group) == 'B-' ? 'selected' : '' }}>
                                B-</option>
                            <option value="O+" {{ old('blood_group', $data->blood_group) == 'O+' ? 'selected' : '' }}>
                                O+</option>
                            <option value="O-" {{ old('blood_group', $data->blood_group) == 'O-' ? 'selected' : '' }}>
                                O-</option>
                            <option value="AB+"
                                {{ old('blood_group', $data->blood_group) == 'AB+' ? 'selected' : '' }}>
                                AB+</option>
                            <option value="AB-"
                                {{ old('blood_group', $data->blood_group) == 'AB-' ? 'selected' : '' }}>
                                AB-</option>
                        </select>
                        @error('blood_group')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="student_photo" class="form-label">Student Photo</label>
                        <input type="file" class="form-control @error('student_photo') is-invalid @enderror"
                            id="student_photo" name="student_photo" />
                        @error('student_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Physical Details Section -->
                <div class="col-md-12">
                    <hr>
                    <h5 class="text-center">Physical Details</h5>
                    <hr>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="height" class="form-label">Height (in cm)</label>
                        <input type="text" class="form-control @error('height') is-invalid @enderror" id="height"
                            name="height" placeholder="Enter height" value="{{ old('height', $data->height) }}" />
                        @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (in kg)</label>
                        <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight"
                            name="weight" placeholder="Enter weight" value="{{ old('weight', $data->weight) }}" />
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="measurement_date" class="form-label">Measurement Date</label>
                        <input type="date" class="form-control @error('measurement_date') is-invalid @enderror"
                            id="measurement_date" name="measurement_date"
                            value="{{ old('measurement_date', $data->measurement_date) }}" />
                        @error('measurement_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="medical_history" class="form-label">Medical History</label>
                        <input type="text" class="form-control @error('medical_history') is-invalid @enderror"
                            id="medical_history" name="medical_history" placeholder="Enter medical history"
                            value="{{ old('medical_history', $data->medical_history) }}" />
                        @error('medical_history')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <!-- Guardian Details Section -->
                <!-- Parent Guardian Details -->
                <div class="col-md-12">
                    <hr>
                    <h5 class="text-center">Parents Details</h5>
                    <hr>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="father_name">Father's Name</label>
                                <input type="text" id="father_name" name="father_name"
                                    class="form-control @error('father_name') is-invalid @enderror"
                                    placeholder="Enter father's name"
                                    value="{{ old('father_name', $data->father_name) }}" />
                                @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="father_phone">Father's Phone</label>
                                <input type="tel" id="father_phone" name="father_phone"
                                    class="form-control @error('father_phone') is-invalid @enderror"
                                    placeholder="Enter father's phone"
                                    value="{{ old('father_phone', $data->father_phone) }}" />
                                @error('father_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="father_occupation">Father's Occupation</label>
                                <input type="text" id="father_occupation" name="father_occupation"
                                    class="form-control @error('father_occupation') is-invalid @enderror"
                                    placeholder="Enter father's occupation"
                                    value="{{ old('father_occupation', $data->father_occupation) }}" />
                                @error('father_occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="father_photo">Father's Photo</label>
                                <input type="file" id="father_photo" name="father_photo"
                                    class="form-control @error('father_photo') is-invalid @enderror" />
                                @error('father_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Mother Details -->

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="mother_name">Mother's Name</label>
                                <input type="text" id="mother_name" name="mother_name"
                                    class="form-control @error('mother_name') is-invalid @enderror"
                                    placeholder="Enter mother's name"
                                    value="{{ old('mother_name', $data->mother_name) }}" />
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="mother_phone">Mother's Phone</label>
                                <input type="tel" id="mother_phone" name="mother_phone"
                                    class="form-control @error('mother_phone') is-invalid @enderror"
                                    placeholder="Enter mother's phone"
                                    value="{{ old('mother_phone', $data->mother_phone) }}" />
                                @error('mother_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="mother_occupation">Mother's Occupation</label>
                                <input type="text" id="mother_occupation" name="mother_occupation"
                                    class="form-control @error('mother_occupation') is-invalid @enderror"
                                    placeholder="Enter mother's occupation"
                                    value="{{ old('mother_occupation', $data->mother_occupation) }}" />
                                @error('mother_occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="mother_photo">Mother's Photo</label>
                                <input type="file" id="mother_photo" name="mother_photo"
                                    class="form-control @error('mother_photo') is-invalid @enderror" />
                                @error('mother_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Guardian Details -->
                <div class="col-md-12">
                    <hr>
                    <h5 class="text-center">Guardian Details</h5>
                    <hr>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_is">If Guardian Is</label>
                                <select id="guardian_is" name="guardian_is"
                                    class="form-select @error('guardian_is') is-invalid @enderror">
                                    <option value="father"
                                        {{ old('guardian_is', $data->guardian_is) == 'father' ? 'selected' : '' }}>Father
                                    </option>
                                    <option value="mother"
                                        {{ old('guardian_is', $data->guardian_is) == 'mother' ? 'selected' : '' }}>Mother
                                    </option>
                                    <option value="other"
                                        {{ old('guardian_is', $data->guardian_is) == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                                @error('guardian_is')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_name">Guardian Name</label>
                                <input type="text" id="guardian_name" name="guardian_name"
                                    class="form-control @error('guardian_name') is-invalid @enderror"
                                    placeholder="Enter guardian's name"
                                    value="{{ old('guardian_name', $data->guardian_name) }}" />
                                @error('guardian_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_relation">Guardian Relation</label>
                                <input type="text" id="guardian_relation" name="guardian_relation"
                                    class="form-control @error('guardian_relation') is-invalid @enderror"
                                    placeholder="Enter relation with guardian"
                                    value="{{ old('guardian_relation', $data->guardian_relation) }}" />
                                @error('guardian_relation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_phone">Guardian Phone</label>
                                <input type="tel" id="guardian_phone" name="guardian_phone"
                                    class="form-control @error('guardian_phone') is-invalid @enderror"
                                    placeholder="Enter guardian's phone"
                                    value="{{ old('guardian_phone', $data->guardian_phone) }}" />
                                @error('guardian_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_occupation">Guardian Occupation</label>
                                <input type="text" id="guardian_occupation" name="guardian_occupation"
                                    class="form-control @error('guardian_occupation') is-invalid @enderror"
                                    placeholder="Enter guardian's occupation"
                                    value="{{ old('guardian_occupation', $data->guardian_occupation) }}" />
                                @error('guardian_occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_email">Guardian Email</label>
                                <input type="email" id="guardian_email" name="guardian_email"
                                    class="form-control @error('guardian_email') is-invalid @enderror"
                                    placeholder="Enter guardian's email"
                                    value="{{ old('guardian_email', $data->guardian_email) }}" />
                                @error('guardian_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_address">Guardian Address</label>
                                <textarea id="guardian_address" name="guardian_address"
                                    class="form-control @error('guardian_address') is-invalid @enderror" rows="3"
                                    placeholder="Enter guardian's address">{{ old('guardian_address', $data->guardian_address) }}</textarea>
                                @error('guardian_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="guardian_photo">Guardian's Photo</label>
                                <input type="file" id="guardian_photo" name="guardian_photo"
                                    class="form-control @error('guardian_photo') is-invalid @enderror" />
                                @error('guardian_photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h5 class="text-center">Student Address Details</h5>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="permanent_address" class="form-label">Permanent Address</label>
                                    <textarea id="permanent_address" name="permanent_address"
                                        class="form-control @error('permanent_address') is-invalid @enderror" rows="3"
                                        placeholder="Enter permanent address">{{ old('permanent_address', $data->permanent_address) }}</textarea>
                                    @error('permanent_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" id="guardian_address_is_current"
                                            name="guardian_address_is_current" class="form-check-input"
                                            {{ old('guardian_address_is_current') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="guardian_address_is_current">If Guardian
                                            Address
                                            Is
                                            Current Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" id="permanent_is_current" name="permanent_is_current"
                                            class="form-check-input" {{ old('permanent_is_current') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permanent_is_current">If Permanent Address Is
                                            Current
                                            Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="current_address" class="form-label">Current Address</label>
                                    <textarea id="current_address" name="current_address"
                                        class="form-control @error('current_address') is-invalid @enderror" rows="3"
                                        placeholder="Enter current address">{{ old('current_address', $data->current_address) }}</textarea>
                                    @error('current_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    @endif
@endsection

@push('script')
    <script>
        const currentAddress = $("#current_address")
        $(document).on("click", "#guardian_address_is_current", function() {
            const guardianAddress = $("#guardian_address").val();
            if ($(this).is(":checked")) {
                currentAddress.val(guardianAddress);
            } else {
                currentAddress.val("");
            }
        });

        // if permanet address is current address then
        $(document).on("click", "#permanent_is_current", function() {
            const permanentAddress = $("#permanent_address").val();
            if ($(this).is(":checked")) {
                currentAddress.val(permanentAddress);
            } else {
                currentAddress.val("");
            }
        })
    </script>
@endpush
