<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
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
            $data = Session::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="'.route('session.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('session.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('session.create');
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
            'session' => 'required|unique:sessions',
        ]);

        $session = new Session();
        $session->session = $request->session;
        $session->save();

        $notification = array('message' => 'Session Added!', 'alert-type' => 'success');
        return redirect()->route('session.index')->with($notification);
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
        $session = Session::findOrFail($id);
        return view('session.edit', compact('session'));
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
        $session = Session::findOrFail($id);
        
        if($session->session == $request->session){
            $request->validate([
                'session' => 'required',
            ]); 
        }else{
            $request->validate([
                'session' => 'required|unique:sessions',
            ]); 
        }

        $session->session = $request->session;
        $session->save();

        $notification = array('message' => 'Session Updated!', 'alert-type' => 'success');
        return redirect()->route('session.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
        
        $notification = array('message' => 'Session Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
