<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    use HasFactory;
    protected $primaryKey = 'canteen_id';
    
    protected $fillable = ['school_id','canteen_name'];
    public function category()
    {
        return $this->hasMany(Category::class, 'canteen_id');
    }
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
