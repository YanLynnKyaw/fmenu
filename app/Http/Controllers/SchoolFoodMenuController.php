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
        
        // $view = 'Show.' . $school->slug . '_food_menu';


        return view('show_food_menu', [
            'school' => $school,
            'canteen' => $canteen,
            'category' => $category,
            'fooditem' => $fooditem,
        ]);
    }

    public function showSchoolFoodMenu1($school_slug)
    {
        $school = School::where('slug', $school_slug)->with('canteen.category.fooditem')->firstOrFail();

        $view = 'Show.' . $school->slug . '_food_menu';

        return view($view, [
            'school' => $school,
        ]);
    }

}
