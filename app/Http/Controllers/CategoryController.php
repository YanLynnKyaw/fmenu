<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


use App\Models\School;
use App\Models\Canteen;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request, $canteen_id)
    {
        
        $selectedCanteen = Canteen::where('canteen_id', $canteen_id)->first();
        $canteen = Canteen::all();
        $category = Category::where('canteen_id', $canteen_id)->get();
        
        return view ('Categories.indexCategory',[
            'selectedCanteen' => $selectedCanteen,
            'category' => $category,
            'canteen'=> $canteen,
            'canteen_id' => $canteen_id
        ])
        ->with('canteen_id', $request->canteen_id);
    }

    public function create ($canteen_id)
    {
        $canteen = Canteen::all();

        return view('Categories.createCategory',[
            'canteen' => $canteen,
            'canteen_id' => $canteen_id,
        ]);
    }

    public function store(Request $request,$canteen_id)
    {
        //dd($request->canteen_name);
        $canteen = Canteen::all();        
        $categorydata = $request->validate([
            'category_name' =>'required',   
        ]);
        
        $categorydata['canteen_id'] = $canteen_id;
        $newCategory = Category::create($categorydata);

        return redirect(route('category.index',['canteen_id' => $categorydata['canteen_id']]));
    }

    public function edit(Category $category, $category_id)
    {
        $category = Category::find($category_id);
        
        return view('Categories.editCategory', ['category' => $category,'category_id' =>$category_id]);
    }

    public function update(Request $request, $category_id,Category $category)
    {
        $data = $request->validate([
            'category_name' =>'required',
        ]);
       
        $category = Category::with('canteen')->findOrFail($category_id);
        
        $category->update($data);
        $canteen_id = $category->canteen->getKey();
        
        return redirect()->route('category.index', ['canteen_id' => $canteen_id])->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category,$category_id)
    {
        $category = Category::with('canteen')->findOrFail($category_id);

        $category->delete();
        $canteen_id = $category->canteen->getKey();
        
        return redirect()->route('category.index',['canteen_id' => $canteen_id]);
    }
}
