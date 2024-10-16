<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_name',
        'author'
    ];

    // relation between calss and section
    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id', 'id');
    }

    // automatically delete related sections when a class is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($classe) {
            $classe->sections()->delete();
        });
    }
}
