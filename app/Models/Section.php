<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'section_name',
        'author'
    ];

    // relation between class and section
    public function classes(){
        return $this->belongsTo(Classe::class,'class_id','id');
    }
}
