<?php

namespace App\Http\Controllers;

use App\Models\RemunerationCategory;
use Illuminate\Http\Request;
use DataTables;

class RemunerationCategoryController extends Controller
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
            $data = RemunerationCategory::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('remuneration-category.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('remuneration-category.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('remuneration_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('remuneration_category.create');
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
            'name' => 'required|unique:remuneration_categories',
        ]);

        $remuneration_category = new RemunerationCategory();
        $remuneration_category->name = $request->name;
        $remuneration_category->save();

        $notification = array('message' => 'Category Added!', 'alert-type' => 'success');
        return redirect()->route('remuneration-category.index')->with($notification);
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
        $remuneration_category = RemunerationCategory::findOrFail($id);
        return view('remuneration_category.edit',compact('remuneration_category'));
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
        $remuneration_category = RemunerationCategory::findOrFail($id);

        if($remuneration_category->name == $request->name){
            $request->validate([
                'name' => 'required',
            ]); 
        }else{
            $request->validate([
                'name' => 'required|unique:remuneration_categories',
            ]); 
        }

        $remuneration_category->name = $request->name;
        $remuneration_category->save();
        
        $notification = array('message' => 'Category Updated!', 'alert-type' => 'success');
        return redirect()->route('remuneration-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remuneration_category = RemunerationCategory::findOrFail($id);
        $remuneration_category->delete();
        
        $notification = array('message' => 'Remuneration Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
