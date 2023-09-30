<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RemunerationCategory;
use App\Models\Descipline;
use App\Models\Designation;
use App\Models\Exam;
use App\Models\Remuneration;
use App\Models\Teacher;
use App\Models\Type;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class RemunerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exams = Exam::all();
        $disciplines = Descipline::all();
        $users = User::orderBy('name', 'ASC')->get();
        return view('remuneration.index', compact('exams', 'disciplines', 'users'));
    }


    //search result

    public function searchResult(Request $request) {
        $rems = Remuneration::where('exam_id', $request->exam_id)
        ->where('discipline_id', $request->discipline_id)
        ->where('user_id', $request->user_id)
        ->get();

        $exam = Exam::where('id', $request->exam_id)->first();
        $discipline = Descipline::where('id', $request->discipline_id)->first();
        $user = User::where('id', $request->user_id)->first();

        return view('remuneration.show', compact('rems', 'exam', 'discipline','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RemunerationCategory::all();
        $disciplines = Descipline::all();
        $exams = Exam::all();
        $users = User::all();
        $designations = Designation::all();
        $types = Type::all();
        return view('remuneration.create', compact('categories', 'disciplines', 'exams', 'users', 'designations', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->teacher;
        $course = $request->course;
        $number = $request->number;
        $student = $request->student;
        $paper = $request->paper;


        for ($count = 0; $count < count($user); $count++) {
            $data = array(
                'discipline_id' => $request->discipline_id,
                'exam_id' => $request->exam_id,
                'category_id' => $request->category_id,
                'rate_id' => $request->rate_id,
                'type_id' => $request->type_id,
                'paper' => $paper[$count],
                'course_id' => $course[$count],
                'user_id' => $user[$count],
                'number' => $number[$count],
                'students' => $student[$count],
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

            );

            $insert_date[] = $data;
        }

        Remuneration::insert($insert_date);

        $notification = array('message' => 'Remuneration Addes', 'alert-type' => 'success');

        if ($request->save) {
            return redirect()->route('remuneration.index')->with($notification);
        } else if ($request->save_another) {
            return redirect()->route('remuneration.create')->with($notification);
        }
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
        return view('remuneration.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
