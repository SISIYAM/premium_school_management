<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AjaxController extends Controller
{
    // method for update student status
    public function studentStatusUpdate(Request $req){
        // first search student
        $student = Student::find($req->student_id);

        if (!$student) {
            return response()->json(['status' => false, 'message' => 'Student not found!']);
        }
        // if found then update student status
        $student->update([
            'status' => $req->status,
        ]);

        $message = $req->status 
            ? 'Student activated successfully.' 
            : 'Student disabled successfully.';
            

        return response()->json(['status' => $req->status, 'message' => $message]);
    }
}
