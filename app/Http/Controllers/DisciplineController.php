<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descipline;
use DataTables;
use Illuminate\Support\Facades\Auth;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin') {

            if ($request->ajax()) {
                $data = Descipline::latest()->get();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        $button = '<a href="' . route('discipline.edit', $data->id) . '" class="edit btn btn-primary">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="' . route('discipline.destroy', $data->id) . '" class="delete btn btn-danger">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            return view('discipline.index');
        } else {
            return view('error.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discipline.create');
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

            'name' => 'required|unique:desciplines',

        ]);

        // Descipline::create($request->all());
        $descipline = new Descipline();

        $descipline->name = $request->name;
        $descipline->save();

        $notification = array('message' => 'Discipline Added!', 'alert-type' => 'success');
        return redirect()->route('discipline.index')->with($notification);
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
        $descipline = Descipline::findOrFail($id);
        return view('discipline.edit', compact('descipline'));
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
        $descipline = Descipline::findOrFail($id);

        if ($descipline->name == $request->name) {
            $request->validate([
                'name' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|unique:desciplines',
            ]);
        }

        $descipline->name = $request->name;
        $descipline->save();

        $notification = array('message' => 'Discipline Updated!', 'alert-type' => 'success');
        return redirect()->route('discipline.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descipline = Descipline::findOrFail($id);
        $descipline->delete();

        $notification = array('message' => 'Discipline Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
