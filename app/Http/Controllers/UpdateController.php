<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{

    // function to handle image upload with custom names
    protected function handleImageUpload($req, $fieldName, $folder, $prefix) {
        if ($req->hasFile($fieldName)) {
            try {
                $file = $req->file($fieldName);
                // get file extension
                $extension = $file->getClientOriginalExtension(); 
                // define custom filename
                $filename = $prefix . '_' . time() . '.' . $extension; 
                // save with custom name
                $file->storeAs("images/$folder", $filename, 'public'); 
                return "images/$folder/$filename";
            } catch (\Exception $e) {
                return 'images/default-image.jpg';
            }
        }
        return 'images/default-image.jpg'; 
    }


    // function to handle image update with delete old image
    protected function updatePhoto($req, $student, $fieldName, $directory, $admission_no)
    {
        if ($req->hasFile($fieldName)) {
            // delete old image if it exists
            if ($student->$fieldName) {
                $this->deleteOldImage($student->$fieldName);
            }
            // upload and return new image path
            return $this->handleImageUpload($req, $fieldName, $directory, $admission_no);
        }
        // return existing image path if no new file is uploaded
        return $student->$fieldName;
    }

    // function to delete image from storage
    protected function deleteOldImage($path)
    {
        // if file exist on public directory then delete it
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    // method for update student details
    public function updateStudentDetails(Request $req){
       // Validation rules with custom messages
       $req->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'roll_no' => 'required|numeric|max_digits:10',
        'gender' => 'required|in:male,female,other',
        'dob' => 'required|string',
        'religion' => 'nullable|string|max:255',
        'category' => 'nullable|string|max:255',
        'class' => 'required|string|max:10',
        'section' => 'required|string|max:10',
        'mobile' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:255',
        'admission_date' => 'required|string',
        'blood_group' => 'nullable|string|max:10',
        'height' => 'nullable|string|max:255',
        'weight' => 'nullable|string|max:255',
        'measurement_date' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'father_name' => 'required|string|max:255',
        'father_phone' => 'required|string|max:15',
        'father_occupation' => 'nullable|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mother_phone' => 'required|string|max:15',
        'mother_occupation' => 'nullable|string|max:255',
        'guardian_name' => 'nullable|string|max:255',
        'guardian_relation' => 'nullable|string|max:255',
        'guardian_phone' => 'nullable|string|max:15',
        'guardian_occupation' => 'nullable|string|max:255',
        'guardian_email' => 'nullable|email|max:255',
        'guardian_address' => 'nullable|string|max:255',
        'current_address' => 'nullable|string|max:255',
        'permanent_address' => 'nullable|string|max:255',
        'student_photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'father_photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'mother_photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        'guardian_photo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'first_name.required' => 'First name is required.',
        'first_name.string' => 'First name must be a string.',
        'first_name.max' => 'First name cannot exceed 255 characters.',
        'last_name.required' => 'Last name is required.',
        'last_name.string' => 'Last name must be a string.',
        'last_name.max' => 'Last name cannot exceed 255 characters.',
        'roll_no.required' => 'Roll number is required.',
        'roll_no.max_digits' => 'Roll number cannot exceed 10 characters.',
        'gender.required' => 'Gender is required.',
        'gender.in' => 'Gender must be male, female, or other.',
        'dob.required' => 'Date of birth is required.',
        'dob.date' => 'Date of birth must be a valid date.',
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be a valid email address.',
        'email.unique' => 'Email has already been taken.',
        'admission_date.required' => 'Admission date is required.',
        'admission_date.date' => 'Admission date must be a valid date.',
        'mobile.required' => 'Mobile number is required.',
        'mobile.max' => 'Mobile number cannot exceed 15 characters.',
        'student_photo.file' => 'Student photo must be a file.',
        'student_photo.mimes' => 'Student photo must be a type of: jpeg, png, jpg, gif.',
        'student_photo.max' => 'Student photo cannot exceed 2MB.',
    ]);

    // first search student based on its id
    $student = Student::where('id',$req->id)->first();

    // fetch admission no from student array
    $admission_no = $student->admission_no;

    // handle image uploads
    $student_photo_path  = $this->updatePhoto($req, $student, 'student_photo', 'students', $admission_no);
    $father_photo_path   = $this->updatePhoto($req, $student, 'father_photo', 'fathers', $admission_no);
    $mother_photo_path   = $this->updatePhoto($req, $student, 'mother_photo', 'mothers', $admission_no);
    $guardian_photo_path = $this->updatePhoto($req, $student, 'guardian_photo', 'guardians', $admission_no);
        
    $student->update([
        'first_name' => $req->first_name,
        'last_name' => $req->last_name,
        'roll_no' => $req->roll_no,
        'gender' => $req->gender,
        'dob' => $req->dob,
        'religion' => $req->religion,
        'category' => $req->category,
        'class' => $req->class,
        'section' => $req->section,
        'mobile' => $req->mobile,
        'email' => $req->email,
        'admission_date' => $req->admission_date,
        'blood_group' => $req->blood_group,
        'height' => $req->height,
        'weight' => $req->weight,
        'measurement_date' => $req->measurement_date,
        'medical_history' => $req->medical_history,
        'father_name' => $req->father_name,
        'father_phone' => $req->father_phone,
        'father_occupation' => $req->father_occupation,
        'mother_name' => $req->mother_name,
        'mother_phone' => $req->mother_phone,
        'mother_occupation' => $req->mother_occupation,
        'guardian_name' => $req->guardian_name,
        'guardian_relation' => $req->guardian_relation,
        'guardian_phone' => $req->guardian_phone,
        'guardian_occupation' => $req->guardian_occupation,
        'guardian_email' => $req->guardian_email,
        'guardian_address' => $req->guardian_address,
        'current_address' => $req->current_address,
        'permanent_address' => $req->permanent_address,
        'student_photo' => $student_photo_path,
        'father_photo' => $father_photo_path,
        'mother_photo' => $mother_photo_path,
        'guardian_photo' => $guardian_photo_path
        
    ]);

    return redirect()->back()->with([
        'icon' => 'success',
        'title' => 'Success!',
        'success' => 'Student details updated successfully',
    ]);
    }
}