<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
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
            $data = Year::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('year.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('year.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('year.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('year.create');
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
            'year' => 'required|unique:years',
        ]);

        $year = new Year();

        $year->year = $request->year;
        $year->save();

        return redirect()->route('year.index');
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
        $year = Year::findOrFail($id);
        return view('year.edit', compact('year'));
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
        $year = Year::findOrFail($id);

        if($year->year == $request->year){
            $request->validate([
                'year' => 'required',
            ]); 
        }else{
            $request->validate([
                'year' => 'required|unique:years',
            ]); 
        }

        $year->year = $request->year;
        $year->save();

        return redirect()->route('year.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year = Year::findOrFail($id);
        $year->delete();
        return redirect()->route('year.index');
    }
}
