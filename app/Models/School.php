<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class School extends Model
{
    use HasFactory;
    use HasFactory, HasSlug;
    
    protected $primaryKey = 'school_id';
    protected $fillable = ['school_name'];

    public function canteen()
    {
        return $this->hasMany(Canteen::class, 'school_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('school_name')
            ->saveSlugsTo('slug');
    }
}
