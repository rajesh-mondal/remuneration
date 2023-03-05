<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descipline;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Descipline::all();
        return view('discipline.index', compact('disciplines'));
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

        return redirect()->route('discipline.index');

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

        if($descipline->name == $request->name){
            $request->validate([
                'name' => 'required',
            ]); 
        }else{
            $request->validate([
                'name' => 'required|unique:desciplines',
            ]); 
        }

        $descipline->name = $request->name;
        $descipline->save();

        return redirect()->route('discipline.index');
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
        return redirect()->route('discipline.index');
    }
}
