<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


use App\Models\School;
use App\Models\Canteen;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\FoodItem;


class FoodItemController extends Controller
{
    public function index(Request $request, $category_id)
    {
        
        $selectedCategory = Category::where('category_id', $category_id)->first();
        $category = Category::all();
        $fooditem = FoodItem::where('category_id', $category_id)->get();
        
        return view ('FoodItems.indexFoodItem',[
            'selectedCategory' => $selectedCategory,
            'fooditem' => $fooditem,
            'category'=> $category,
            'category_id' => $category_id
        ])
        ->with('category_id', $request->category_id);
    }

    public function create ($category_id)
    {
        $category = Category::all();

        return view('FoodItems.createFoodItem',[
            'category' => $category,
            'category_id' => $category_id,
        ]);
    }

    public function store(Request $request,$category_id)
    {
        //dd($request->canteen_name);
        $category = Category::all();        
        $fooditemdata = $request->validate([
            'fooditem_name' =>'required',   
            'fooditem_price' => 'required'
        ]);
        
        $fooditemdata['category_id'] = $category_id;
        $newFoodItem = FoodItem::create($fooditemdata);

        return redirect(route('fooditem.index',['category_id' => $fooditemdata['category_id']]));
    }

    public function edit(FoodItem $fooditem, $fooditem_id)
    {
        $fooditem = FoodItem::find($fooditem_id);
        
        return view('FoodItems.editFoodItem', ['fooditem' => $fooditem,'fooditem_id' =>$fooditem_id]);
    }

    public function update(Request $request, $fooditem_id,FoodItem $fooditem)
    {
        $data = $request->validate([
            'fooditem_name' =>'required',
            'fooditem_price' => 'required',
        ]);
       
        $fooditem = FoodItem::with('category')->findOrFail($fooditem_id);
        
        $fooditem->update($data);
        $category_id = $fooditem->category->getKey();
        
        return redirect()->route('fooditem.index', ['category_id' => $category_id])->with('success', 'FoodItem updated successfully');
    }

    public function destroy(FoodItem $fooditem,$fooditem_id)
    {
        $fooditem = FoodItem::with('category')->findOrFail($fooditem_id);

        $fooditem->delete();
        $category_id = $fooditem->category->getKey();
        
        return redirect()->route('fooditem.index',['category_id' => $category_id]);
    }
}
