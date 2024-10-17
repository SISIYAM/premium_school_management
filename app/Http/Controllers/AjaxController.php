<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Section;
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

    // method for create section
    public function createSection(Request $req){
        
        $req->validate([
            'class_id' => 'required|numeric',
            'section_name' => 'required|string'
        ]);

        $insert = Section::create([
            'class_id' => $req->class_id,
            'section_name' => $req->section_name,
            'author' => $this->admin_id
        ]);

        // after insert search all classes
        $sections = Section::with(['getClass.getAuthor'])->get();
        
        return response()->json(['status' => true, 'message' => 'Section created successfully.','sections' => $sections]);
    }

    // method for delete class
    public function deleteClass(Request $req){
        
        $delete = Classe::find($req->class_id);
    
        if (!$delete) {
            return response()->json(['status' => false, 'message' => 'Class not found.']); 
        } 

        $delete->delete();

        // now fetch all classes
        $classes = Classe::with('getAuthor')->get();

        return response()->json(['status' => true, 'message' => 'Class deleted successfully.','classes' => $classes]);

       
        
    }

     // method for delete Section
     public function deleteSection(Request $req){
        
        $delete = Section::find($req->section_id);
    
        if (!$delete) {
            return response()->json(['status' => false, 'message' => 'Section not found.']); 
        } 

        $delete->delete();

        // now fetch all Sections
        $sections = Section::with(['getClass.getAuthor'])->get();

        return response()->json(['status' => true, 'message' => 'Sections deleted successfully.','sections' => $sections]);
        
    }
    
    // method for filter sections based on class
    public function filterClassSearch(Request $req){
        // filter section based on class
        $availableSections = Section::where('class_id',$req->class_id)->get();
        if ($availableSections->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No sections found for the selected class.',
                'sections' => [],
            ]);
        }

        return response()->json([
            'status' => true,
            'sections' => $availableSections,
        ]);
    }

    // method for filter student based on section id and class id
    public function filterStudentList(Request $req){
        
        if($req->section_id == 'all'){
            $filteredStudent = Student::where('class',$req->class_id)->with('getClass','getSection')->get();  
        }else{
            $filteredStudent = Student::where('section',$req->section_id)->with('getClass','getSection')->get();
        }
        
        return response()->json(['status' => true,'students' => $filteredStudent]);
        
    }
}
