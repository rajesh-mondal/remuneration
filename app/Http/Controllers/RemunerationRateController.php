<?php

namespace App\Http\Controllers;

use App\Models\RemunerationCategory;
use App\Models\RemunerationRate;
use Illuminate\Http\Request;
use DataTables;

class RemunerationRateController extends Controller
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
            $data = RemunerationRate::latest()->get();
            return DataTables::of($data)
            ->addColumn('category', function($data){
                return $data->remunerationCategory['name'];                    
            })
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('remuneration-rate.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('remuneration-rate.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['category', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('remuneration_rate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $remuneration_categories = RemunerationCategory::all();
        return view('remuneration_rate.create',compact('remuneration_categories'));
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
            'category_id' => 'required',
            'amount' => 'required',
        ]);

        $remuneration_rate = new RemunerationRate();
        $remuneration_rate->category_id = $request->category_id;
        $remuneration_rate->amount = $request->amount;
        $remuneration_rate->save();

        $notification = array('message' => 'Remuneration Rate Added!', 'alert-type' => 'success');
        return redirect()->route('remuneration-rate.index')->with($notification);
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
        $remuneration_rate = RemunerationRate::findOrFail($id);
        $remuneration_categories = RemunerationCategory::all();
        return view('remuneration_rate.edit',compact('remuneration_rate','remuneration_categories'));
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
        $remuneration_rate = RemunerationRate::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'amount' => 'required',
            'title' => 'required|max:500',
        ]);

        $remuneration_rate->category_id = $request->category_id;
        $remuneration_rate->title = $request->title;
        $remuneration_rate->amount = $request->amount;
        $remuneration_rate->save();
        
        $notification = array('message' => 'Remuneration Rate Updated!', 'alert-type' => 'success');
        return redirect()->route('remuneration-rate.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remuneration_rate = RemunerationRate::findOrFail($id);
        $remuneration_rate->delete();
        
        $notification = array('message' => 'Remuneration Rate Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
