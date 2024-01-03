<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Canteen;

class CanteenController extends Controller
{
    public function index(Request $request, $school_id)
    {
        
        $selectedSchool = School::where('school_id', $school_id)->first();
        $schools = School::all();
        $canteens = Canteen::where('school_id', $school_id)->get();
        
        return view ('Canteens.indexCanteen',[
            'selectedSchool' => $selectedSchool,
            'canteens' => $canteens,
            'schools'=> $schools,
            'school_id' => $school_id
        ])
        ->with('school_id', $request->school_id);
    }

    public function create ($school_id)
    {
        $schools = School::all();

        return view('Canteens.createCanteen',[
            'schools' => $schools,
            'school_id' => $school_id,
        ]);
    }

    public function store(Request $request,$school_id)
    {
        //dd($request->canteen_name);
        $schools = School::all();        
        $canteeendata = $request->validate([
            'canteen_name' =>'required',   
            
        ]);
        
        $canteeendata['school_id'] = $school_id;
        $newCanteen = Canteen::create($canteeendata);

        return redirect(route('canteens.index',['school_id' => $canteeendata['school_id']]));
    }

    public function edit(Canteen $canteens, $canteen_id)
    {
        $canteens = Canteen::find($canteen_id);
        
        return view('Canteens.editCanteen', ['canteens' => $canteens,'canteen_id' =>$canteen_id]);
    }

    public function update(Request $request, $canteen_id,Canteen $canteen)
    {
        $data = $request->validate([
            'canteen_name' =>'required',
        ]);
       
        $canteen = Canteen::with('school')->findOrFail($canteen_id);
        
        $canteen->update($data);
        $school_id = $canteen->school->getKey();
        
        return redirect()->route('canteens.index', ['school_id' => $school_id])->with('success', 'Canteen updated successfully');
    }

    public function destroy(Canteen $canteen,$canteen_id)
    {
        $canteen = Canteen::with('school')->findOrFail($canteen_id);

        $canteen->delete();
        $school_id = $canteen->school->getKey();
        
        return redirect()->route('canteens.index',['school_id' => $school_id]);
    }
}
