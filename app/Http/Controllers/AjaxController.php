<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    protected $admin_id;

    public function __construct()
    {
        $this->admin_id = auth()->user()->id;
    }

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

    // method for create class
    public function createClass(Request $req){
        
        $req->validate([
            'class_name' => 'required|string'
        ]);

        $insert = Classe::create([
            'class_name' => $req->class_name,
            'author' => $this->admin_id
        ]);

        // after insert search all classes
        $class = Classe::with('getAuthor')->get();
        
        return response()->json(['status' => true, 'message' => 'Class created successfully.','classes' => $class]);
    }
}
