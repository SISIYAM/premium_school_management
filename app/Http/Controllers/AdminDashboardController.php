<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    // method for load admin dahsboard
    public function loadDashboard(){
        return view('pages.index');
    }
    // method for load student details table
    public function loadStudentDetailsTable(){
        $thead = ['A.No','Status','Student Name','Roll','Class','Gender','Category','Mobile','Action'];
        $students = Student::with('getClass','getSection')
        ->orderBy('id', 'desc') 
        ->get();
        // return $students;
        // fetch all classes
        $classes = Classe::all();

        // return $students;
        return view('tables.student-list-table',['key'=> 'studentDetails','thead' => $thead,'tableRow' => $students,'classes' => $classes]);
    }

    // method for load create student form 
    public function loadStudentCreateForm(){
        // fetch all classes
        $classes = Classe::all();
      
        return view('forms.student-admission-form',['classes' => $classes]);
    }

    // method for load student profile
    public function loadStudentProfile($id = null){
        if(!$id){
            return view('errors.error-404');
        }

        $student = Student::where(compact('id'))->first();

        if(empty($student)){
            return view('errors.error-404');
        }
        // return $student;
        return view('pages.student-profile',['data' => $student]);
        
    }

    // method for load update student form
    public function loadStudentUpdateForm($id = null){
        if(!$id){
            return view('errors.error-404');
        }
        $student = Student::where(compact('id'))->first();
        if(empty($student)){
            return view('errors.error-404');
        }

        // fetch all classes
        $classes = Classe::all();
        // fetch all sections
        $sections = Section::all();

        return view('forms.update.update-student-admission-form',['data' => $student,'classes' => $classes,'sections' => $sections]);
    }

    // method for load class list
    public function loadClassesList(){

        // table headers
        $thead = ['#','Class Name','Author','Created At','Last Update', 'Action'];

        $class = Classe::with('getAuthor')->get();

        // return $class;
        return view('tables.manage-classes',['key' => 'classes','thead' => $thead, 'tableRow' => $class]);
    }

    // method for load sections
    public function loadSectionsList(){
     // table headers
     $thead = ['#','Class Name','Section Name','Author','Created At','Last Update', 'Action'];

     $section = Section::with(['getClass.getAuthor'])->get();

     $classes = Classe::all();
    //  return $section;
     return view('tables.manage-sections',['key' => 'classes','thead' => $thead, 'tableRow' => $section,'classes' => $classes]);
    }

    // method for load disabled students 
    public function loadDisabledStudents(){
        $thead = ['A.No','Status','Student Name','Roll','Class','Gender','Category','Mobile','Action'];
        $students = Student::where('status',0)->with('getClass','getSection')->get();
        // return $students;
        // fetch all classes
        $classes = Classe::all();

        // return $students;
        return view('tables.disabled-students',['key'=> 'studentDetails','thead' => $thead,'tableRow' => $students,'classes' => $classes]);
    }

    // method for load attendance form
    public function loadTakeAttendanceForm(){
        return view('forms.attendance-form');
    }


}
