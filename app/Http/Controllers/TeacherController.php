<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Descipline;
use App\Models\Designation;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplines = Descipline::all();
        $designations = Designation::all();
        return view('teacher.create', compact('disciplines', 'designations'));
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
            'name' => 'required|unique:teachers',
            'designation_id' => 'required',
            'descipline_id' => 'required',
            'address' => 'nullable',
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->designation_id = $request->designation_id;
        $teacher->descipline_id = $request->descipline_id;
        $teacher->address = $request->address;
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $disciplines = Descipline::all();
        $designations = Designation::all();
        return view('teacher.edit', compact('teacher', 'disciplines', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        if($teacher->name == $request->name){
            $request->validate([
                'name' => 'required',
                'designation_id' => 'required',
                'descipline_id' => 'required',
                'address' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => 'required|unique:teachers',
                'designation_id' => 'required',
                'descipline_id' => 'required',
                'address' => 'nullable',
            ]);
        }

        $teacher->name = $request->name;
        $teacher->descipline_id = $request->descipline_id;
        $teacher->designation_id = $request->designation_id;
        $teacher->address = $request->address;
        $teacher->save();

        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index');
    }
}
