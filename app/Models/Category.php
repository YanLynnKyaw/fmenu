<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'category'; 

    protected $primaryKey = 'category_id';
    
    protected $fillable = ['canteen_id','category_name'];

    public function fooditem()
    {
        return $this->hasMany(FoodItem::class, 'category_id');
    }
    public function canteen()
    {
        return $this->belongsTo(Canteen::class, 'canteen_id');
    }
}

