<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(School $schools)
    {
        
        $schools = School::all();
        return view ('Dashboard',['schools' => $schools]);
    }

    public function create ()
    {
        return view('Schools.createSchool');
    }

    public function store(Request $request)
    {
        // dd($request->school_name);
        $data = $request->validate([
            'school_name' =>'required',
        ]);
        $newSchool = School::create($data);

        return redirect(route('schools.index'));
    }

    public function show(School $schools)
    {
        return redirect(route('schools.index'));
    }

    public function edit(School $schools, $school_id)
    {
        $schools = School::find($school_id);

        return view('Schools.editSchool', ['schools' => $schools,'school_id' =>$school_id]);
    }

    public function update(Request $request, $school_id,School $school)
    {
        $data = $request->validate([
            'school_name' =>'required',
        ]);
        $school = School::where('school_id', $school_id);
        $school->update($data);
        
        return redirect()->route('schools.index')->with('success', 'School updated successfully');
    }

    public function destroy(School $school,$school_id)
    {
        $school = School::find($school_id);
        // if ($school->fooditem()->exists()) 
        // {
        //     $school->fooditem()->delete();
        // }
        // if ($school->category()->exists()) 
        // {
        //     $school->category()->delete();
        // }
        // if ($school->canteen()->exists()) 
        // {
        //     $school->canteen()->delete();
        // }
        
        // $canteen = $school->canteen;
        // $category = $canteen->category;
        
        foreach($school->canteen as $canteen){
            foreach($canteen->category as $category){
                $category->fooditem()->delete();
            }
            $canteen->category()->delete();
        }
        $school->canteen()->delete();
        $school->delete();
        
    
        $school->delete();
        
        return redirect()->route('schools.index');
    }

}
