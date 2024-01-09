<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\School;
use App\Models\Canteen;
use App\Models\Category;
use App\Models\FoodItem;

class SchoolFoodMenuController extends Controller
{
    public function showSchoolFoodMenu($school_slug)
    {
        $school = School::where('school_name', $school_slug)->firstOrFail();
        $canteen = Canteen::where('school_id', $school->id)->with('category.fooditem')->get();
        $category = Category::whereIn('canteen_id', $canteen->pluck('canteen_id'))->get();
        $fooditem = FoodItem::whereIn('category_id', $category->pluck('category_id'))->get();
        
        return view('show_canteen', [
            'school' => $school,
            'canteen' => $canteen,
            'category' => $category,
            'fooditem' => $fooditem,
        ]);
    }

    public function showCanteenData($school_name, $canteen_name)
    {
        $school = School::where('school_name', $school_name)->firstOrFail();
        $canteen = Canteen::where('school_id', $school->school_id)
            ->where('canteen_name', $canteen_name)
            ->with('category.fooditem')
            ->firstOrFail();
        $category = $canteen->category;
        $fooditem = $category->flatMap->fooditem;

        return view('show_food_menu', [
            'school' => $school,
            'canteen' => $canteen,
            'category' => $category,
            'fooditem' => $fooditem,
        ]);
    }

}
