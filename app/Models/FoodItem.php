<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    
    protected $table = 'fooditem'; 

    protected $primaryKey = 'fooditem_id';
    
    protected $fillable = ['category_id','fooditem_name','fooditem_price'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

