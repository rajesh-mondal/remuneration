<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Year;
use App\Models\Term;
use App\Models\Session;
use Illuminate\Http\Request;
use DataTables;

class ExamController extends Controller
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
            $data = Exam::latest()->get();
            return DataTables::of($data)
                ->addColumn('year', function($data){
                    return $data->year['year'];                    
                })

                ->addColumn('term', function($data){
                    return $data->term['term'];                    
                })

                ->addColumn('session', function($data){
                    return $data->session['session'];                    
                })

                ->addColumn('action', function($data){
                    $button = '<a href="'.route('exam.edit', $data->id).'" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="'.route('exam.destroy', $data->id).'" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['year','term', 'session', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
       
        return view('exam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        $terms = Term::all();
        $sessions = Session::all();
        return view('exam.create', compact('years', 'terms', 'sessions'));
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
            'year_id' => 'required',
            'term_id' => 'required',
            'session_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $exam = new Exam();
        $exam->year_id = $request->year_id;
        $exam->term_id = $request->term_id;
        $exam->session_id = $request->session_id;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->save();

        $notification = array('message' => 'Exam Added!', 'alert-type' => 'success');
        return redirect()->route('exam.index')->with($notification);
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
        $exam = Exam::findOrFail($id);
        $years = Year::all();
        $terms = Term::all();
        $sessions = Session::all();
        return view('exam.edit', compact('exam', 'years', 'terms', 'sessions'));
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
        $exam = Exam::findOrFail($id);

        $request->validate([
            'year_id' => 'required',
            'term_id' => 'required',
            'session_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $exam->year_id = $request->year_id;
        $exam->term_id = $request->term_id;
        $exam->session_id = $request->session_id;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->save();

        $notification = array('message' => 'Exam Updated!', 'alert-type' => 'success');
        return redirect()->route('exam.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        
        $notification = array('message' => 'Exam Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
