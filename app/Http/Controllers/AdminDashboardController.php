<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $thead = ['A.No','Student Name','Roll','Class','Gender','Category','Mobile','Action'];
        $students = Student::all();

        // return $students;
        return view('tables.student-list-table',['key'=> 'studentDetails','thead' => $thead,'tableRow' => $students]);
    }

    // method for load create student form 
    public function loadStudentCreateForm(){
        return view('forms.student-admission-form');
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

        return view('pages.student-profile',['data' => $student]);
        
    }
}
