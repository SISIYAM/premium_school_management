<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // method for load student details table
    public function loadStudentDetailsTable(){
        $thead = ['A.No','Student Name','Roll','Class','Gender','Category','Mobile','Action'];
        $tableRow = User::all();

        // return $tableRow;
        return view('tables.student-list-table',['key'=> 'studentDetails','thead' => $thead,'tableRow' => $tableRow]);
    }

    // method for load create student form 
    public function loadStudentCreateForm(){
        return view('forms.student-admission-form');
    }
}
