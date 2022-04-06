<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
    
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = \DB::table('regions')
            ->get();
        
        return view('students.create', compact('regions'));
    }
    public function getProvinces(Request $request)
    {
        $provinces = \DB::table('provinces')
            ->where('region_id', $request->region_id)
            ->get();
        
        if (count($provinces) > 0) {
            return response()->json($provinces);
        }
    }

    /**
     * return cities list
     *
     * @return json
     */
    public function getCities(Request $request)
    {
        $cities = \DB::table('cities')
            ->where('province_id', $request->province_id)
            ->get();
        
        if (count($cities) > 0) {
            return response()->json($cities);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'region' => 'numeric',
            'province' => 'numeric',
            'city' => 'numeric',
            'bday' => 'required',
            'age' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Student::create($input);
     
        return redirect()->route('students.index')
                        ->with('success','Student added successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $regions = \DB::table('regions')
            ->get();
        $provinces = \DB::table('provinces')
            ->get();
        $cities = \DB::table('cities')
            ->get();    
        return view('students.edit', compact('regions','student','provinces','cities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'region' => 'numeric',
            'province' => 'numeric',
            'city' => 'numeric',
            'bday' => 'required',
            'age' => 'required',
            'address' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $student->update($input);
    
        return redirect()->route('students.index')
                        ->with('success','Student Profile updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
     
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }
}
