<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_name',
        'author'
    ];

    // relation between calss and section
    public function getSections()
    {
        return $this->hasMany(Section::class, 'class_id', 'id');
    }
    
    // relation between classes and author
    public function getAuthor(){
        return $this->belongsTo(User::class,'author','id');
    }

    // automatically delete related sections when a class is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($classe) {
            $classe->getSections()->delete();
        });
    }

    
}
