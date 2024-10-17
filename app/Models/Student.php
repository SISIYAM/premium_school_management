<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_no',
        'first_name',
        'last_name',
        'roll_no',
        'gender',
        'dob',
        'religion',
        'category',
        'class',
        'section',
        'mobile',
        'email',
        'admission_date',
        'blood_group',
        'student_photo',
        'height',
        'weight',
        'measurement_date',
        'medical_history',
        'father_name',
        'father_phone',
        'father_occupation',
        'father_photo',
        'mother_name',
        'mother_phone',
        'mother_occupation',
        'mother_photo',
        'guardian_is',
        'guardian_name',
        'guardian_relation',
        'guardian_phone',
        'guardian_occupation',
        'guardian_email',
        'guardian_address',
        'guardian_photo',
        'current_address',
        'permanent_address',
    ];
    
    // relation between student and class
    public function getClass(){
        return $this->belongsTo(Classe::class,'class','id');
    }

    // relation between student and section
    public function getSection(){
        return $this->belongsTo(Section::class,'section','id');
    }
}
