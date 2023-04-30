<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;
use DataTables;

class TermController extends Controller
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
            $data = Term::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('term.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('term.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('term.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('term.create');
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
            'term' => 'required|unique:terms',
        ]);

        $term = new Term();
        $term->term = $request->term;
        $term->save();

        $notification = array('message' => 'Term Created!', 'alert-type' => 'success');
        return redirect()->route('term.index')->with($notification);
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
        $term = Term::findOrFail($id);
        return view('term.edit', compact('term'));
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
        $term = Term::findOrFail($id);

        if($term->term == $request->term){
            $request->validate([
                'term' => 'required',
            ]); 
        }else{
            $request->validate([
                'term' => 'required|unique:terms',
            ]); 
        }

        $term->term = $request->term;
        $term->save();

        $notification = array('message' => 'Term Updated!', 'alert-type' => 'success');
        return redirect()->route('term.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::findOrFail($id);
        $term->delete();
        
        $notification = array('message' => 'Term Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
