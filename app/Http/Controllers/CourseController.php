<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Descipline;
use DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Course::latest()->get();
            return DataTables::of($data)
                ->addColumn('discipline', function($data){
                    return $data->descipline['name'];                    
                })

                ->addColumn('action', function($data){
                    $button = '<a href="'.route('course.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('course.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['discipline', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplines = Descipline::all();
        return view('course.create',compact('disciplines'));
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
            'course' => 'required|unique:courses',
            'descipline_id' => 'required',
        ]);

        $course = new Course();

        $course->course = $request->course;
        $course->descipline_id = $request->descipline_id;
        $course->save();

        $notification = array('message' => 'Course Added!', 'alert-type' => 'success');
        return redirect()->route('course.index')->with($notification);
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
        $course = Course::findOrFail($id);
        $disciplines = Descipline::all();
        return view('course.edit', compact('course', 'disciplines'));

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
        $course = Course::findOrFail($id);

        if($course->course == $request->course){
            $request->validate([
                'course' => 'required',
                'descipline_id' => 'required',
            ]);
        }else{
            $request->validate([
                'course' => 'required|unique:courses',
                'descipline_id' => 'required',
            ]);
        }

        $course->course = $request->course;
        $course->descipline_id = $request->descipline_id;
        $course->save();

        $notification = array('message' => 'Course Updated!', 'alert-type' => 'success');
        return redirect()->route('course.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        $notification = array('message' => 'Course Deleted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
